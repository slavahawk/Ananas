<?php


namespace frontend\controllers;


use frontend\controllers\behaviors\AccessBehavior;
use frontend\models\forms\EditForm;
use frontend\models\User;
use Yii;
use yii\web\Controller;

class CabinetController extends Controller
{

    public function behaviors()
    {
        return [
            AccessBehavior::className(),
        ];
    }

    public function actionIndex()
    {
        $user = Yii::$app->user->identity;

        return $this->render('index', [
            'user' => $user,
        ]);
    }

    public function actionEdit()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect(['user/login']);
        }

        $user = $this->findModel();

        $model = new EditForm($user);

        if ($model->load(Yii::$app->request->post()) && $model->edit()) {
            return $this->redirect(['cabinet/index']);
        }

        return $this->render('edit', [
            'model' => $model,
        ]);
    }

    /**
     * @return User the loaded model
     */
    private function findModel()
    {
        return User::findOne(Yii::$app->user->identity->getId());
    }

}