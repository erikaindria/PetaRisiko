<?php

namespace frontend\controllers;

use Yii;
use frontend\models\AhpTanahLongsor;
use frontend\models\Kabupaten;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AhpTanahLongsorController implements the CRUD actions for AhpTanahLongsor model.
 */
class ViewGeomAhpController extends Controller
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

    public function ahp()
    {
        $query = (new \yii\db\Query())
        ->select(['kabupaten.nama_kabupaten','ahp_tanah_longsor.bobot']) 
        ->from('ahp_tanah_longsor')
        ->orderBy('ahp_tanah_longsor.id_kabupaten')
        ->join('JOIN', 'kabupaten', 'kabupaten.id_kabupaten = ahp_tanah_longsor.id_kabupaten');
        
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
        $data['ahp'] = $this->ahp();
        $nilaiahp = $data['ahp'];
        // var_dump($nilaiahp);die();

        for ($i=0; $i < count($nilaiahp); $i++) { 
            $bobot[$i] = $nilaiahp[$i]['bobot'];
        }

        $data['bobot'] = $bobot;

        // var_dump($bobot);die();

        //TAMPUNG KABUPATEN
        $data['tamp_kab'] = $this->data_bencana();
        $tamp_kab = $data['tamp_kab'];
        

        for ($i=0; $i < count($tamp_kab); $i++) { 
            $tampung[$i] = $tamp_kab[$i]['id_kabupaten'];
        }
        $data['tampung'] = $tampung;

        for ($x=0; $x < count($tampung); $x++) {
            $arr[] = [
                'id_kab' => $tampung[$x],
            ];
        }
        $tempArrId = array();
        for ($y=0; $y < count($arr); $y++) { 
            // print_r($arr[$y]);
            array_push($tempArrId, $arr[$y]['id_kab']);
        }
        $countIdKab = array_count_values($tempArrId);




        //PENETRALISIR
        for ($dt=0; $dt < count($bobot); $dt++) { 
            $datatest[$dt] = $bobot[$dt] * 10000;
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

        for ($ts=0; $ts < count($bobot) ; $ts++) { 
            if ($bobot[$ts]*10000 < $batasatas)
                $stats[$ts] = "RENDAH";
            elseif ($bobot[$ts]*10000 >= $batasatas && $bobot[$ts]*10000 <= $batasbawah)
                $stats[$ts] = "SEDANG";
            else
                $stats[$ts] = "TINGGI"; 
        }

        $data['stats'] = $stats;

        

        //PERBANDINGAN
        for ($z=0; $z < count($countIdKab); $z++) { 
            if ($stats[$z] == 'RENDAH') {
                $warna[$z] = '#00FF00'; //rendah-hijau
            }
            elseif ($stats[$z] == 'SEDANG') {
                $warna[$z] = '#FFFF00'; //sedang-kuning
            }
            elseif ($stats[$z] == 'TINGGI') {
                $warna[$z] = '#FF0000'; //tinggi-merah
            }
        }
        



        return $this->render('index', [
            'query' => $data,
            'warna' => $warna,
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
