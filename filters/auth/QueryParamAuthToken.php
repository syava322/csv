<?php

namespace filters\auth;

use yii\filters\auth\QueryParamAuth;
use app\models\User;

class QueryParamAuthToken extends QueryParamAuth
{

    public function authenticate($user, $request, $response)
    {
        $appToken = $request->get($this->tokenParam);

        if ((is_string($appToken))) {
            $indentity = User::findIdentityByAccessToken($appToken);

            if ($indentity !== null)
                $user->login($indentity);

            return $indentity;
        }

        if ($appToken !== null)
            $this->handleFailure($response);
    }
}