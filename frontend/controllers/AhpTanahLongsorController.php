<?php

namespace frontend\controllers;

use Yii;
use app\models\AhpTanahLongsor;
use frontend\models\Kabupaten;
use frontend\models\KerentananEkonomi;
use frontend\models\KerentananFisik;
use frontend\models\KerentananLingkungan;
use frontend\models\KerentananSosial;
use frontend\models\IndeksKapasitas;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AhpTanahLongsorController implements the CRUD actions for AhpTanahLongsor model.
 */
class AhpTanahLongsorController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    public function longsor()
    {

        $query = (new \yii\db\Query())
        ->select(['bencana.id_kabupaten','bencana.tanggal_kejadian', 'kabupaten.nama_kabupaten', 'tanah_longsor.latitude', 'tanah_longsor.longtitude', 'tanah_longsor.kerentanan_gerakan_tanah']) 
        ->from('bencana')
        ->join('LEFT JOIN', 'tanah_longsor', 'bencana.id_bencana = tanah_longsor.id_bencana')
        ->join('LEFT JOIN', 'kabupaten', 'kabupaten.id_kabupaten = bencana.id_kabupaten');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }

    public function kerenek()
    {
        $query = (new \yii\db\Query())
        ->select(['kabupaten.id_kabupaten','kabupaten.nama_kabupaten', 'kerentanan_ekonomi.lahan_produktif', 'kerentanan_ekonomi.PDRB']) 
        ->from('kabupaten')
        ->join('JOIN', 'kerentanan_ekonomi', 'kabupaten.id_kerenek = kerentanan_ekonomi.id_kerenek');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }

    public function kerensos(){
         $query = (new \yii\db\Query())
        ->select(['kabupaten.id_kabupaten','kabupaten.nama_kabupaten', 'kerentanan_sosial.kepadatan_penduduk', 'kerentanan_sosial.rasio_jenis_kelamin', 'kerentanan_sosial.rasio_kemiskinan', 'kerentanan_sosial.rasio_orang_cacat', 'kerentanan_sosial.rasio_kelompok_umur']) 
        ->from('kabupaten')
        ->join('JOIN', 'kerentanan_sosial', 'kabupaten.id_kerensos = kerentanan_sosial.id_kerensos');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }

    public function kerenling(){
        $query = (new \yii\db\Query())
        ->select(['kabupaten.id_kabupaten','kabupaten.nama_kabupaten', 'kerentanan_lingkungan.hutan_lindung', 'kerentanan_lingkungan.hutan_alam', 'kerentanan_lingkungan.hutan_bakau', 'kerentanan_lingkungan.semak_belukar']) 
        ->from('kabupaten')
        ->join('JOIN', 'kerentanan_lingkungan', 'kabupaten.id_kerenling = kerentanan_lingkungan.id_kerenling');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }

    public function kerenfis(){
        $query = (new \yii\db\Query())
        ->select(['kabupaten.id_kabupaten','kabupaten.nama_kabupaten', 'kerentanan_fisik.fasilitas_umum', 'kerentanan_fisik.fasilitas_kritis', 'kerentanan_fisik.rumah']) 
        ->from('kabupaten')
        ->join('JOIN', 'kerentanan_fisik', 'kabupaten.id_kerenfis = kerentanan_fisik.id_kerenfis');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }

    public function data_kabupaten(){
        $query = (new \yii\db\Query())
        ->select(['kabupaten.id_kabupaten','kabupaten.nama_kabupaten', 'kabupaten.id_kerenek', 'kabupaten.id_kerenfis', 'kabupaten.id_kerenling', 'kabupaten.id_kerensos', 'kabupaten.id_indeks_kapasitas'])
        ->from('kabupaten');

        $command = $query->createCommand();
        $data = $command->queryAll();

        return $data;
    }

    public function indeks()
    {
        $query = (new \yii\db\Query())
        ->select(['kabupaten.id_kabupaten','kabupaten.nama_kabupaten', 'indeks_kapasitas.skor', 'indeks_kapasitas.id_indeks_kapasitas']) 
        ->from('kabupaten')
        ->join('JOIN', 'indeks_kapasitas', 'kabupaten.id_indeks_kapasitas = indeks_kapasitas.id_indeks_kapasitas');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }

    public function actionIndex()
    {
        $data['data_kab'] = $this->data_kabupaten();
        $data_kab = $data['data_kab'];
        // var_dump($data_kab);die();



        //HAZARD
        $data['data_longsor'] = $this-> longsor();
        $dlongsor = $data['data_longsor'];

        for ($i=0; $i < count($dlongsor); $i++) { 
            if ($dlongsor[$i]['kerentanan_gerakan_tanah'] == 'Rendah') {
                $skor_longsor[$i] = 0.333333;
            }
            elseif ($dlongsor[$i]['kerentanan_gerakan_tanah'] == 'Sedang') {
                $skor_longsor[$i] = 0.666667;
            }
            else
                $skor_longsor[$i] = 1;
        }
        $data['skor_longsor'] = $skor_longsor;

        // var_dump($dlongsor);die();




        //KERENTANAN SOSIAL

        $data['sosial'] = $this->kerensos();
        $nilaisosial = $data['sosial'];

        for ($i=0; $i < count($nilaisosial); $i++) { 
            if ($nilaisosial[$i]['kepadatan_penduduk'] < 500)
                $skorkepadatan[$i] = $nilaisosial[$i]['kepadatan_penduduk'] / 500;
            elseif ($nilaisosial[$i]['kepadatan_penduduk'] >= 500 && $nilaisosial[$i]['kepadatan_penduduk'] <= 1000)
                $skorkepadatan[$i] = $nilaisosial[$i]['kepadatan_penduduk'] / 1000;
            else
                $skorkepadatan[$i] = $nilaisosial[$i]['kepadatan_penduduk'] / $nilaisosial[$i]['kepadatan_penduduk'];
        }

        for ($i=0; $i < count($nilaisosial); $i++) { 
            if ($nilaisosial[$i]['rasio_jenis_kelamin'] < 20)
                $skorkelamin[$i] = $nilaisosial[$i]['rasio_jenis_kelamin'] / 20;
            elseif ($nilaisosial[$i]['rasio_jenis_kelamin'] >= 20 && $nilaisosial[$i]['rasio_jenis_kelamin'] <= 40)
                $skorkelamin[$i] = $nilaisosial[$i]['rasio_jenis_kelamin'] / 40;
            else
                $skorkelamin[$i] = $nilaisosial[$i]['rasio_jenis_kelamin'] / $nilaisosial[$i]['rasio_jenis_kelamin'];
        }

        for($i=0;$i <count($nilaisosial);$i++){
            if ($nilaisosial[$i]['rasio_kemiskinan'] < 20)
                $skormiskin[$i] = $nilaisosial[$i]['rasio_kemiskinan'] / 20;
            elseif($nilaisosial[$i]['rasio_kemiskinan'] >= 20 && $nilaisosial[$i]['rasio_kemiskinan'] <= 40)
                $skormiskin[$i] = $nilaisosial[$i]['rasio_kemiskinan'] / 40;
            else
                $skormiskin[$i] = $nilaisosial[$i]['rasio_kemiskinan'] / $nilaisosial[$i]['rasio_kemiskinan'];
        }

        for($i=0;$i <count($nilaisosial);$i++){
            if ($nilaisosial[$i]['rasio_orang_cacat'] < 20)
                $skorcacat[$i] = $nilaisosial[$i]['rasio_orang_cacat'] / 20;
            elseif($nilaisosial[$i]['rasio_orang_cacat'] >= 20 && $nilaisosial[$i]['rasio_orang_cacat'] <= 40)
                $skorcacat[$i] = $nilaisosial[$i]['rasio_orang_cacat'] / 40;
            else
                $skorcacat[$i] = $nilaisosial[$i]['rasio_orang_cacat'] / $nilaisosial[$i]['rasio_orang_cacat'];
        }

        for($i=0;$i <count($nilaisosial);$i++){
            if ($nilaisosial[$i]['rasio_kelompok_umur'] < 20)
                $skorumur[$i] = $nilaisosial[$i]['rasio_kelompok_umur'] / 20;
            elseif($nilaisosial[$i]['rasio_kelompok_umur'] >= 20 && $nilaisosial[$i]['rasio_kelompok_umur'] <= 40)
                $skorumur[$i] = $nilaisosial[$i]['rasio_kelompok_umur'] / 40;
            else
                $skorumur[$i] = $nilaisosial[$i]['rasio_kelompok_umur'] / $nilaisosial[$i]['rasio_kelompok_umur'];
        }

        for ($i=0; $i < count($skorkepadatan); $i++) { 
            $skorsosial[$i] = (0.6 * (log($skorkepadatan[$i] / 0.01) / log(100 / 0.01))) + (0.1 * $skorkelamin[$i]) + (0.1 * $skorcacat[$i]) + (0.1 * $skormiskin[$i]) + (0.1 * $skorumur[$i]);
        }

        $data['skorkepadatan'] = $skorkepadatan;
        $data['skorkelamin'] = $skorkelamin;
        $data['skormiskin'] = $skormiskin;
        $data['skorcacat'] = $skorcacat;
        $data['skorumur'] = $skorumur;
        $data['skorsosial'] = $skorsosial;



        //KERENTANAN EKONOMI
        $data['ekonomi'] = $this->kerenek();
        $nilaiekonomi = $data['ekonomi'];

        for($i=0; $i < count($nilaiekonomi); $i++){
            if ($nilaiekonomi[$i]['lahan_produktif'] < 50)
                $skorlahan[$i] = ($nilaiekonomi[$i]['lahan_produktif'] / 50);
            elseif ($nilaiekonomi[$i]['lahan_produktif'] >= 50 && $nilaiekonomi[$i]['lahan_produktif'] <= 200)
                $skorlahan[$i] = ($nilaiekonomi[$i]['lahan_produktif'] / 200);
            else
                $skorlahan[$i] = ($nilaiekonomi[$i]['lahan_produktif'] / $nilaiekonomi[$i]['lahan_produktif']);
        }

        for($i=0; $i < count($nilaiekonomi); $i++){
            if ($nilaiekonomi[$i]['PDRB'] < 100)
                $skorPDRB[$i] = ($nilaiekonomi[$i]['PDRB'] / 100);
            elseif ($nilaiekonomi[$i]['PDRB'] >= 100 && $nilaiekonomi[$i]['PDRB'] <= 300)
                $skorPDRB[$i] = ($nilaiekonomi[$i]['PDRB'] / 300);
            else
                $skorPDRB[$i] = ($nilaiekonomi[$i]['PDRB'] / $nilaiekonomi[$i]['PDRB']);
        }
        

        for ($i=0; $i < count($skorPDRB); $i++) { 
            $skorekonomi[$i] = (0.6 * $skorlahan[$i]) + (0.4 * $skorPDRB[$i]);
        }

        $data['skorlahan'] = $skorlahan;
        $data['skorPDRB'] = $skorPDRB;
        $data['skorekonomi'] = $skorekonomi;


        

        //KERENTANAN FISIK
        $data['fisik'] = $this->kerenfis();
        $nilaifisik = $data['fisik'];

        for($i=0; $i < count($nilaifisik); $i++){
            if ($nilaifisik[$i]['fasilitas_umum'] < 500) 
                $skorumum[$i] = ($nilaifisik[$i]['fasilitas_umum'] / 500);
            elseif ($nilaifisik[$i]['fasilitas_umum'] >= 500 && $nilaifisik[$i]['fasilitas_umum'] <= 1000)
                $skorumum[$i] = ($nilaifisik[$i]['fasilitas_umum'] / 1000);
            else
                $skorumum[$i] = ($nilaifisik[$i]['fasilitas_umum'] / $nilaifisik[$i]['fasilitas_umum']);
        }

        for($i=0; $i < count($nilaifisik); $i++){
            if ($nilaifisik[$i]['fasilitas_kritis'] < 500) 
                $skorkritis[$i] = ($nilaifisik[$i]['fasilitas_kritis'] / 500);
            elseif ($nilaifisik[$i]['fasilitas_kritis'] >= 500 && $nilaifisik[$i]['fasilitas_kritis'] <= 1000)
                $skorkritis[$i] = ($nilaifisik[$i]['fasilitas_kritis'] / 1000);
            else
                $skorkritis[$i] = ($nilaifisik[$i]['fasilitas_kritis'] / $nilaifisik[$i]['fasilitas_kritis']);
        }

        for($i=0; $i < count($nilaifisik); $i++){
            if ($nilaifisik[$i]['rumah'] < 400) 
                $skorrumah[$i] = ($nilaifisik[$i]['rumah'] / 400);
            elseif ($nilaifisik[$i]['rumah'] >= 400 && $nilaifisik[$i]['rumah'] <= 800)
                $skorrumah[$i] = ($nilaifisik[$i]['rumah'] / 800);
            else
                $skorrumah[$i] = ($nilaifisik[$i]['rumah'] / $nilaifisik[$i]['rumah']);
        }


        for ($i=0; $i < count($skorrumah) ; $i++) { 
            $skorfisik[$i] = (0.4 * $skorrumah[$i]) + (0.3 * $skorumum[$i]) + (0.3 * $skorkritis[$i]);
        }

        $data['skorrumah'] = $skorrumah;
        $data['skorumum'] = $skorumum;
        $data['skorkritis'] = $skorkritis;
        $data['skorfisik'] = $skorfisik;

        //KERENTANAN LINGKUNGAN
        $data['lingkungan'] = $this->kerenling();
        $nilailingkungan = $data['lingkungan'];

        for($i=0; $i < count($nilailingkungan); $i++){
            if ($nilailingkungan[$i]['hutan_lindung'] < 20)
                $skorlindung[$i] = $nilailingkungan[$i]['hutan_lindung'] / 20;
            elseif($nilailingkungan[$i]['hutan_lindung'] >= 20 && $nilailingkungan[$i]['hutan_lindung'] <= 50)
                $skorlindung[$i] = $nilailingkungan[$i]['hutan_lindung'] / 50;
            else
                $skorlindung[$i] = $nilailingkungan[$i]['hutan_lindung'] / $nilailingkungan[$i]['hutan_lindung'];
        }

        for ($i=0; $i < count($nilailingkungan); $i++) { 
            if($nilailingkungan[$i]['hutan_alam'] < 25)
                $skoralam[$i] = $nilailingkungan[$i]['hutan_alam'] / 25;
            elseif($nilailingkungan[$i]['hutan_alam'] >= 25 && $nilailingkungan[$i]['hutan_alam'] <= 75)
                $skoralam[$i] = $nilailingkungan[$i]['hutan_alam'] / 75;
            else
                $skoralam[$i] = $nilailingkungan[$i]['hutan_alam'] / $nilailingkungan[$i]['hutan_alam'];
        }

        for ($i=0; $i < count($nilailingkungan); $i++) { 
            if($nilailingkungan[$i]['hutan_bakau'] < 10)
                $skorbakau[$i] = $nilailingkungan[$i]['hutan_bakau'] / 10;
            elseif($nilailingkungan[$i]['hutan_bakau'] >= 10 && $nilailingkungan[$i]['hutan_bakau'] <= 30)
                $skorbakau[$i] = $nilailingkungan[$i]['hutan_bakau'] / 30;
            else
                $skorbakau[$i] = $nilailingkungan[$i]['hutan_bakau'] / $nilailingkungan[$i]['hutan_bakau'];
        }

        for ($i=0; $i < count($nilailingkungan); $i++) { 
            if($nilailingkungan[$i]['semak_belukar'] < 10)
                $skorbelukar[$i] = $nilailingkungan[$i]['semak_belukar'] / 10;
            elseif($nilailingkungan[$i]['semak_belukar'] >= 10 && $nilailingkungan[$i]['semak_belukar'] <= 30)
                $skorbelukar[$i] = $nilailingkungan[$i]['semak_belukar'] / 30;
            else
                $skorbelukar[$i] = $nilailingkungan[$i]['semak_belukar'] / $nilailingkungan[$i]['semak_belukar'];
        }


        for ($i=0; $i < count($nilailingkungan); $i++) { 
            $skorlingkungan[$i] = (0.4 * $skorlindung[$i]) + (0.4 * $skoralam[$i]) + (0.1 * $skorbakau[$i]) + (0.1 * $skorbelukar[$i]);
        }

        $data['skorlindung'] = $skorlindung;
        $data['skoralam'] = $skoralam;
        $data['skorbakau'] = $skorbakau;
        $data['skorbelukar'] = $skorbelukar;
        $data['skorlingkungan'] = $skorlingkungan;

        for ($i=0; $i < count($skorsosial); $i++) { 
            $skorkerentanan[$i] = (0.4 * $skorsosial[$i]) + (0.25 * $skorekonomi[$i]) + (0.25 * $skorfisik[$i]) + (0.1 * $skorlingkungan[$i]);
        }

        $data['skorkerentanan'] = $skorkerentanan;
        // var_dump($skorkerentanan);die();




        //INDEKS KAPASITAS
        $data['nilaiindeks'] = $this->indeks();
        $nilaiindeks = $data['nilaiindeks'];


        for($i=0; $i < count($nilaiindeks); $i++){
            if ($nilaiindeks[$i]['skor'] < 0.33) 
                $skorindeks[$i] = ($nilaiindeks[$i]['skor'] / 0.33);
            elseif($nilaiindeks[$i]['skor'] >= 0.33 && $nilaiindeks[$i]['skor'] <= 0.66)
                $skorindeks[$i] = ($nilaiindeks[$i]['skor'] / 0.66) *1;
            else
                $skorindeks[$i] = ($nilaiindeks[$i]['skor'] / $nilaiindeks[$i]['skor']);
        }   
        // var_dump($skorindeks);die();
        $data['skorindeks'] = $skorindeks;





        // var_dump($dlongsor);die();






        //PERHITUNGAN BOBOT AHP
        for ($i=0; $i < count($dlongsor); $i++) { 
            $idkab = $dlongsor[$i]['id_kabupaten'];
            

            $bobotahp[$i] = (0.65 * $skor_longsor[$i]) + (0.22 * $skorkerentanan[$idkab-1]) + (0.13 * $skorindeks[$idkab-1]);
            // var_dump($bobotahp);die();

            // $bobotahp[$i] = $bobotahp[$i] /10;
        }
        $data['bobotahp'] = $bobotahp;

        // var_dump($bobotahp);die();





        //PENETRALISIR
        for ($dt=0; $dt < count($bobotahp); $dt++) { 
            $datatest[$dt] = $bobotahp[$dt] * 10000;
        }

        ///// NATURAL BREAKS /////

        $batasatas = 0;
        $batasbawah = 0;
        $sdamfix = 0;
        $sdcmallfix =0;
        $gvffix =0;
        $flag =0;

        
        for ($geje=0; $geje < 100 ; $geje++) { 

            // MEMBANGKITKAN NILAI RANDOM

            $nilaimin = min($datatest);
            $nilaimax = max($datatest);

                        

            $rand1 = rand($nilaimin,$nilaimax) % ($nilaimax - $nilaimin) + $nilaimin;
            $rand2 = rand($nilaimin,$nilaimax) % ($nilaimax - $nilaimin) + $nilaimin;

            // $rand1 = 6;
            // $rand2 = 3;

            if ($rand2 > $rand1) {
                $test = 1;
            }
            else
                $test = 0;

            //PEMBAGIAN KELAS 

            $kls1=0;
            $kls2=0;
            $kls3=0;

            $kelas1=NULL;
            $kelas2=NULL;
            $kelas3=NULL;

            for($i = 0 ; $i < count($datatest) ; $i++ ){
                if ($rand2 > $rand1) {
                    if ($datatest[$i] < $rand1) {
                        $kelas1[$kls1] = $datatest[$i];
                        $kls1++;
                    }
                    elseif ($datatest[$i] > $rand2) {
                        $kelas3[$kls3] = $datatest[$i];
                        $kls3++;
                    }
                    else{
                        $kelas2[$kls2] = $datatest[$i];
                        $kls2++;
                    }
                }
                else{
                    if ($datatest[$i] < $rand2) {
                        $kelas1[$kls1] = $datatest[$i];
                        $kls1++;
                    }
                    elseif ($datatest[$i] > $rand1) {
                        $kelas3[$kls3] = $datatest[$i];
                        $kls3++;
                    }
                    else{
                        $kelas2[$kls2] = $datatest[$i];
                        $kls2++;
                    }
                }
            }


            // MENCARI ARRAY MEAN

            $am = array_sum($datatest) / count($datatest);

            // MENGHITUNG SDAM
            $sdam =0;
            for($i =0 ; $i < count($datatest); $i++){
                $sdam = $sdam + pow(($datatest[$i]-$am), 2);
            }

            // MENCARI ARRAY MEAN PER KELAS

            if($kelas1 == NULL)
                $amk1 = 0;
            else
                $amk1 = array_sum($kelas1) / count($kelas1);

            if ($kelas2 == NULL)
                $amk2 = 0;
            else
                $amk2 = array_sum($kelas2) / count($kelas2);
                
            if ($kelas3 == NULL)
                $amk3 = 0;
            else
                $amk3 = array_sum($kelas3) / count($kelas3);
                        
                        // if($kelas1 == NULL){
                        //  $tester = 1;
                        //  $amk1 = 1;
                        //  $amk2 = array_sum($kelas2) / count($kelas2);
                        //  $amk3 = array_sum($kelas3) / count($kelas3);
                        // }
                        // elseif (is_null($kelas2)) {
                        //  $tester = 2;
                        //  $amk1 = array_sum($kelas1) / count($kelas1);
                        //  $amk2 = 0.0;
                        //  $amk3 = array_sum($kelas3) / count($kelas3);
                        // }
                        // elseif (is_null($kelas3)) {
                        //  $tester = 3;
                        //  $amk1 = array_sum($kelas1) / count($kelas1);
                        //  $amk2 = array_sum($kelas2) / count($kelas2);
                        //  $amk3 = 0;
                        // }
                        // else
                        // $tester = 4;
                        // $amk1 = array_sum($kelas1) / count($kelas1);
                        // $amk2 = array_sum($kelas2) / count($kelas2);
                        // $amk3 = array_sum($kelas3) / count($kelas3);

            // MENGHITUNG SDCM Kelas 1
            $sdcm1 =0;
            for($i =0 ; $i < count($kelas1); $i++){
                $sdcm1 = $sdcm1 + pow(($kelas1[$i]-$amk1), 2);
            }

            // MENGHITUNG SDCM Kelas 2
            $sdcm2 =0;
            for($i =0 ; $i < count($kelas2); $i++){
                $sdcm2 = $sdcm2 + pow(($kelas2[$i]-$amk2), 2);
            }

            // MENGHITUNG SDCM Kelas 3
            $sdcm3 =0;
            for($i =0 ; $i < count($kelas3); $i++){
                $sdcm3 = $sdcm3 + pow(($kelas3[$i]-$amk3), 2);
            }

            //MENGHITUNG SDCM_ALL
            $sdcmall = $sdcm1 + $sdcm2 + $sdcm3;

            // MENGHITUNG GVF
            $gvf = ( $sdam - $sdcmall ) / $sdam;



            // MENCARI BATAS FIX NATURAL BREAKS DENGAN KRITERIA SDCM_ALL (MENDEKATI 0) dan GVF (MENDEKATI 1)

            if ($sdamfix == 0){
                $sdamfix = $sdam;
                $sdcmallfix = $sdcmall;
                $gvffix = $gvf;
                
                
                if($rand1 > $rand2){
                    $batasatas = $rand2;
                    $batasbawah = $rand1;
                }
                else{
                    $batasatas = $rand1;
                    $batasbawah = $rand2;
                }
            }
            else{
                $flag++;
                if ($sdcmall < $sdcmallfix && $gvf > $gvffix) {
                    $sdcmallfix = $sdcmall;
                    $gvffix = $gvf;

                    if($rand1 > $rand2){
                    $batasatas = $rand2;
                    $batasbawah = $rand1;
                    }
                    
                    else{
                        $batasatas = $rand1;
                        $batasbawah = $rand2;
                    }
                }
            }
            
            
         }

        // $data['sdam'] = $sdam;
        // $data['sdcmall'] = $sdcmall;
        // $data['rand1'] = $rand1;
        // $data['rand2'] = $rand2;

        $data['sdamfix'] = $sdamfix;
        $data['sdcmallfix'] = $sdcmallfix;
        $data['batasatas'] = $batasatas;
        $data['batasbawah'] = $batasbawah;
        $data['gvffix'] = $gvffix;

        // $data['kelas1'] = $kelas1;
        // $data['kelas2'] = $kelas2;
        // $data['kelas3'] = $kelas3;
        
        //////////////////////////////////////////////// NATURAL BREAKS ENDING ////////////////////////////////////////////

        //PEMBERIAN STATUS SETELAH MENDAPATKAN BATAS DARI NATURAL BREAKS
        // $teststatus = array(1,2,4,4,3,5,6,1,2,2,3,2,7,8,9,4,3,5,2,1,9,8,7,7,7,6,5,2,2,1);
        // $btsa = 3;
        // $btsb = 7;

        for ($ts=0; $ts < count($bobotahp) ; $ts++) { 
            if ($bobotahp[$ts]*10000 < $batasatas)
                $stats[$ts] = "RENDAH";
            elseif ($bobotahp[$ts]*10000 >= $batasatas && $bobotahp[$ts]*10000 <= $batasbawah)
                $stats[$ts] = "SEDANG";
            else
                $stats[$ts] = "TINGGI"; 
        }

        $data['stats'] = $stats;







  

        return $this->render('index', [
            'query' => $data,
        ]);
    }

    /**
     * Displays a single AhpTanahLongsor model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new AhpTanahLongsor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AhpTanahLongsor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_ahp_tanah_longsor]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AhpTanahLongsor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_ahp_tanah_longsor]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AhpTanahLongsor model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the AhpTanahLongsor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AhpTanahLongsor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AhpTanahLongsor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
