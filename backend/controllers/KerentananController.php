<?php

namespace backend\controllers;

use Yii;
use backend\models\Kabupaten;
use backend\models\KerentananEkonomi;
use backend\models\KerentananFisik;
use backend\models\KerentananLingkungan;
use backend\models\KerentananSosial;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * KerentananEkonomiController implements the CRUD actions for KerentananEkonomi model.
 */
class KerentananController extends Controller
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
     * Lists all KerentananEkonomi models.
     * @return mixed
     */

    public function kerensos(){
        $query = (new \yii\db\Query())
        ->select ('*')
        ->from('kerentanan_sosial');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }

    public function kerenek(){
        $query = (new \yii\db\Query())
        ->select ('*')
        ->from('kerentanan_ekonomi');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }

    public function kerenfis(){
        $query = (new \yii\db\Query())
        ->select ('*')
        ->from('kerentanan_fisik');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }

    public function kerenling(){
        $query = (new \yii\db\Query())
        ->select ('*')
        ->from('kerentanan_lingkungan');
        
        $command = $query->createCommand(); 
        $data = $command->queryAll();

        return $data;
    }


    public function actionIndex()
    {
        $data['sosial'] = $this->kerensos();
        $nilaisosial = $data['sosial'];

        $data['ekonomi'] = $this->kerenek();
        $nilaiekonomi = $data['ekonomi'];

        $data['fisik'] = $this->kerenfis();
        $nilaifisik = $data['fisik'];

        $data['lingkungan'] = $this->kerenling();
        $nilailingkungan = $data['lingkungan'];

        return $this->render('index', [
            'query' => $data,
        ]);
    }

    /**
     * Displays a single KerentananEkonomi model.
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
     * Creates a new KerentananEkonomi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new KerentananEkonomi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_kerenek]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing KerentananEkonomi model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id_kerenek]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing KerentananEkonomi model.
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
     * Finds the KerentananEkonomi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return KerentananEkonomi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = KerentananEkonomi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
