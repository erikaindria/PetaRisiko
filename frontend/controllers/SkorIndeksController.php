<?php

namespace frontend\controllers;

use Yii;
use frontend\models\IndeksKapasitas;
use frontend\models\Kabupaten;
// use app\models\Kabupaten;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;


/**
 * IndeksKapasitasController implements the CRUD actions for IndeksKapasitas model.
 */
class SkorIndeksController extends Controller
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

    public function actionIndex(){
    	$data['nilaiindeks'] = $this->indeks();
    	$nilaiindeks = $data['nilaiindeks'];


        for($i=0; $i < count($nilaiindeks); $i++){
            if ($nilaiindeks[$i]['skor'] < 0.33) 
                $skorindeks[$i] = ($nilaiindeks[$i]['skor'] / 0.33);
            else if($nilaiindeks[$i]['skor'] >= 0.33 && $nilaiindeks[$i]['skor'] <= 0.66)
                $skorindeks[$i] = ($nilaiindeks[$i]['skor'] / 0.66) *1;
            else
                $skorindeks[$i] = ($nilaiindeks[$i]['skor'] / $nilaiindeks[$i]['skor']);
        }   
        // var_dump($nilaiindeks);die();
 
		$data['skorindeks'] = $skorindeks;


		//var_dump($data);
        return $this->render('index', [
            'query' => $data,
        ]);
		// $this->load->view('skorindeks',$data);
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
