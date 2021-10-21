<?php

namespace app\controllers;

use filters\auth\QueryParamAuthToken;
use yii\rest\ActiveController;
use yii\web\Response;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\User';
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuthToken::class,
            'tokenParam' => 'app_token'
        ];
        // Удалить огранечение запросов к api
        unset($behaviors['rateLimiter']);
        $behaviors['contentNegotiator']['formats']['text/html'] = Response::FORMAT_JSON;

        return $behaviors;
    }
}