<?php

namespace frontend\controllers;

use Yii;
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
 * IndeksKapasitasController implements the CRUD actions for IndeksKapasitas model.
 */
class KerentananLongsorController extends Controller
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

    public function data_kabupaten(){
        $query = (new \yii\db\Query())
        ->select(['kabupaten.nama_kabupaten', 'kabupaten.id_kerenek', 'kabupaten.id_kerenfis', 'kabupaten.id_kerenling', 'kabupaten.id_kerensos', 'kabupaten.id_indeks_kapasitas'])
        ->from('kabupaten');

        $command = $query->createCommand();
        $data = $command->queryAll();

        return $data;
    }


    public function actionIndex(){

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

        //Check Kabupaten (Sosial)
        // for ($i=0; $i < count($kabmod); $i++) 
        //     $cek_sosial[$i] = $kabmod[$i]['id_kerensos'];
        
        // $data['cek_sosial'] = $cek_sosial;


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



        //Check Kabupaten (Ekonomi)
        // $data['kabmod'] = $this->data_kabupaten();
        // $kabmod = $data['kabmod'];

        // for ($i=0; $i < count($kabmod); $i++) 
        //     $cek_ekonomi[$i] = $kabmod[$i]['id_kerenek'];
        
        // $data['cek_ekonomi'] = $cek_ekonomi;

        

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

        // //Check Kabupaten (Fisik)
        // for ($i=0; $i < count($kabmod); $i++) 
        //     $cek_fisik[$i] = $kabmod[$i]['id_kerenfis'];
        
        // $data['cek_fisik'] = $cek_fisik;



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



        //Check Kabupaten (Lingkungan)
        // for ($i=0; $i < count($kabmod); $i++) 
        //     $cek_lingkungan[$i] = $kabmod[$i]['id_kerenling'];
        
        // $data['cek_lingkungan'] = $cek_lingkungan;

        for ($i=0; $i < count($skorsosial); $i++) { 
            $skorkerentanan[$i] = (0.4 * $skorsosial[$i]) + (0.25 * $skorekonomi[$i]) + (0.25 * $skorfisik[$i]) + (0.1 * $skorlingkungan[$i]);
        }

        $data['skorkerentanan'] = $skorkerentanan;
  

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
