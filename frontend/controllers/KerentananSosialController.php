<?php

namespace frontend\controllers;

use Yii;
use frontend\models\KerentananSosial;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use frontend\models\Kabupaten;

/**
 * KerentananSosialController implements the CRUD actions for KerentananSosial model.
 */
class KerentananSosialController extends Controller
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

    /**
     * Lists all KerentananSosial models.
     * @return mixed
     */
    
    public function actionIndex()
    {
        // $dataProvider = new ActiveDataProvider([
        //     'query' => KerentananSosial::find(),
        // ]);

        // return $this->render('index', [
        //     'dataProvider' => $dataProvider,
        // ]);
       
       $query = (new \yii\db\Query())
        ->select(['kabupaten.nama_kabupaten', 'kerentanan_sosial.kepadatan_penduduk', 'kerentanan_sosial.rasio_jenis_kelamin', 'kerentanan_sosial.rasio_kemiskinan', 'kerentanan_sosial.rasio_orang_cacat', 'kerentanan_sosial.rasio_kelompok_umur']) 
        ->from('kabupaten')
        ->join('JOIN', 'kerentanan_sosial', 'kabupaten.id_kerensos = kerentanan_sosial.id_kerensos');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $this->render('index', [
            'query' => $data,
        ]);
    }

    /**
     * Displays a single KerentananSosial model.
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
     * Creates a new KerentananSosial model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KerentananSosial();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_kerensos]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing KerentananSosial model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_kerensos]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing KerentananSosial model.
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
     * Finds the KerentananSosial model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KerentananSosial the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KerentananSosial::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
