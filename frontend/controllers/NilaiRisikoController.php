<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Bencana;
use frontend\models\Kabupaten;
use frontend\models\TanahLongsor;
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
 * IndeksKapasitasController implements the CRUD actions for IndeksKapasitas model.
 */
class NilaiRisikoController extends Controller
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

    public function kerenek()
    {
        $query = (new \yii\db\Query())
        ->select(['kabupaten.nama_kabupaten', 'kerentanan_ekonomi.lahan_produktif', 'kerentanan_ekonomi.PDRB']) 
        ->from('kabupaten')
        ->join('JOIN', 'kerentanan_ekonomi', 'kabupaten.id_kerenek = kerentanan_ekonomi.id_kerenek');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }

    public function kerensos(){
         $query = (new \yii\db\Query())
        ->select(['kabupaten.nama_kabupaten', 'kerentanan_sosial.kepadatan_penduduk', 'kerentanan_sosial.rasio_jenis_kelamin', 'kerentanan_sosial.rasio_kemiskinan', 'kerentanan_sosial.rasio_orang_cacat', 'kerentanan_sosial.rasio_kelompok_umur']) 
        ->from('kabupaten')
        ->join('JOIN', 'kerentanan_sosial', 'kabupaten.id_kerensos = kerentanan_sosial.id_kerensos');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }

    public function kerenling(){
        $query = (new \yii\db\Query())
        ->select(['kabupaten.nama_kabupaten', 'kerentanan_lingkungan.hutan_lindung', 'kerentanan_lingkungan.hutan_alam', 'kerentanan_lingkungan.hutan_bakau', 'kerentanan_lingkungan.semak_belukar']) 
        ->from('kabupaten')
        ->join('JOIN', 'kerentanan_lingkungan', 'kabupaten.id_kerenling = kerentanan_lingkungan.id_kerenling');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }

    public function kerenfis(){
        $query = (new \yii\db\Query())
        ->select(['kabupaten.nama_kabupaten', 'kerentanan_fisik.fasilitas_umum', 'kerentanan_fisik.fasilitas_kritis', 'kerentanan_fisik.rumah']) 
        ->from('kabupaten')
        ->join('JOIN', 'kerentanan_fisik', 'kabupaten.id_kerenfis = kerentanan_fisik.id_kerenfis');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }

    public function indeks()
    {
        $query = (new \yii\db\Query())
        ->select(['kabupaten.nama_kabupaten', 'indeks_kapasitas.skor', 'indeks_kapasitas.id_indeks_kapasitas']) 
        ->from('kabupaten')
        ->join('JOIN', 'indeks_kapasitas', 'kabupaten.id_indeks_kapasitas = indeks_kapasitas.id_indeks_kapasitas');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }

    public function data_kabupaten(){
        $query = (new \yii\db\Query())
        ->select(['kabupaten.nama_kabupaten', 'kabupaten.id_kerenek', 'kabupaten.id_kerenfis', 'kabupaten.id_kerenling', 'kabupaten.id_kerensos', 'kabupaten.id_indeks_kapasitas'])
        ->from('kabupaten');

        $command = $query->createCommand();
        $data = $command->queryAll();

        return $data;
    }

    public function longsor()
    {

        $query = (new \yii\db\Query())
        ->select(['bencana.tanggal_kejadian', 'kabupaten.nama_kabupaten', 'tanah_longsor.latitude', 'tanah_longsor.longtitude', 'tanah_longsor.kerentanan_gerakan_tanah']) 
        ->from('bencana')
        ->join('LEFT JOIN', 'tanah_longsor', 'bencana.id_bencana = tanah_longsor.id_bencana')
        ->join('LEFT JOIN', 'kabupaten', 'kabupaten.id_kabupaten = bencana.id_kabupaten');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }

    public function data_bencana()
    {
        $query = (new \yii\db\Query())
        ->select(['bencana.id_kabupaten','kabupaten.nama_kabupaten', 'bencana.alamat_kejadian', 'bencana.tanggal_kejadian', 'bencana.waktu_kejadian']) 
        ->from('kabupaten')
        ->join('JOIN', 'bencana', 'bencana.id_kabupaten = kabupaten.id_kabupaten');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }


    public function actionIndex()
    {
        //INDEKS KAPASITAS
        $data['nilaiindeks'] = $this->indeks();
        $nilaiindeks = $data['nilaiindeks'];

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

        //HAZARD TANAH LONGSOR
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



        //TAMPUNG KABUPATEN
        $data['tamp_kab'] = $this->data_bencana();
        $tamp_kab = $data['tamp_kab'];
        

        for ($i=0; $i < count($tamp_kab); $i++) { 
            $tampung[$i] = $tamp_kab[$i]['id_kabupaten'];

        }

        $data['tampung'] = $tampung;



        //NILAI KERENTANAN
        for ($i=0; $i < count($skorsosial); $i++) { 
            $ratker[$i] = (0.4 * $skorsosial[$i]) + (0.25 * $skorekonomi[$i]) + (0.25 * $skorfisik[$i]) + (0.1 * $skorlingkungan[$i]);
        }
        $data['ratker'] = $ratker;


        //MENCARI NILAI RISIKO

        for($i=0 ; $i < count($tampung); $i++){
            $nilairisk[$i] = ($skor_longsor[$i] * $ratker[$tampung[$i]-1]) / $nilaiindeks[$tampung[$i]-1]['skor']; 
        }

        $data['nilairisk'] = $nilairisk;



        //PENETRALISIR
        for ($dt=0; $dt < count($nilairisk); $dt++) { 
            $datatest[$dt] = $nilairisk[$dt] * 10000;
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

        for ($ts=0; $ts < count($nilairisk) ; $ts++) { 
            if ($nilairisk[$ts]*10000 < $batasatas)
                $stats[$ts] = "RENDAH";
            elseif ($nilairisk[$ts]*10000 >= $batasatas && $nilairisk[$ts]*10000 <= $batasbawah)
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
     * Finds the IndeksKapasitas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return IndeksKapasitas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = IndeksKapasitas::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}