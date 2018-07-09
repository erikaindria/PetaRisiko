<?php

namespace frontend\controllers;

use Yii;
use app\models\Bencana;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

use frontend\models\Kabupaten;
/**
 * BencanaController implements the CRUD actions for Bencana model.
 */
class BencanaController extends Controller
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
     * Lists all Bencana models.
     * @return mixed
     */
    public function actionIndex()
    {
        // $dataProvider = new ActiveDataProvider([
        //     'query' => Bencana::find(),
        // ]);

        // return $this->render('index', [
        //     'dataProvider' => $dataProvider,
        // ]);

        $query = (new \yii\db\Query())
        ->select(['kabupaten.nama_kabupaten', 'bencana.alamat_kejadian', 'bencana.tanggal_kejadian', 'bencana.waktu_kejadian']) 
        ->from('kabupaten')
        ->join('JOIN', 'bencana', 'bencana.id_kabupaten = kabupaten.id_kabupaten');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $this->render('index', [
            'query' => $data,
        ]);
    }

    /**
     * Displays a single Bencana model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function actionJson(){
        
    }

    /**
     * Creates a new Bencana model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Bencana();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_bencana]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Bencana model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_bencana]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Bencana model.
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
     * Finds the Bencana model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bencana the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bencana::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
