<?php

namespace frontend\controllers;

use Yii;
use app\models\TanahLongsor;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use yii\helpers\ArrayHelper;
use frontend\models\Kabupaten;
use frontend\models\Bencana;
/**
 * TanahLongsorController implements the CRUD actions for TanahLongsor model.
 */
class TanahLongsorController extends Controller
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
     * Lists all TanahLongsor models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $dataProvider = new ActiveDataProvider([
        //     'query' => TanahLongsor::find(),
        // ]);

        // return $this->render('index', [
        //     'dataProvider' => $dataProvider,
        // ]);

        $query = (new \yii\db\Query())
        ->select(['bencana.tanggal_kejadian', 'kabupaten.nama_kabupaten', 'tanah_longsor.latitude', 'tanah_longsor.longtitude', 'tanah_longsor.kerentanan_gerakan_tanah']) 
        ->from('bencana')
        ->join('LEFT JOIN', 'tanah_longsor', 'bencana.id_bencana = tanah_longsor.id_bencana')
        ->join('LEFT JOIN', 'kabupaten', 'kabupaten.id_kabupaten = bencana.id_kabupaten');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $this->render('index', [
            'query' => $data,
        ]);
    }

    /**
     * Displays a single TanahLongsor model.
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
     * Creates a new TanahLongsor model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new TanahLongsor();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tanah_longsor]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing TanahLongsor model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_tanah_longsor]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing TanahLongsor model.
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
     * Finds the TanahLongsor model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return TanahLongsor the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = TanahLongsor::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
