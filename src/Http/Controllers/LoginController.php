<?php

namespace ManoCode\Oa\Http\Controllers;

use GuzzleHttp;
use Illuminate\Http\Request;
use ManoCode\Oa\OaServiceProvider;
use Slowlyo\OwlAdmin\Controllers\AdminController;

class LoginController extends AdminController
{
    public function login(Request $request)
    {
        if (OaServiceProvider::setting('oa_login_enabled') != 1) {
            throw  new \Exception('未开启oa登录');
        }
        $params = $request->only(['code']);
        $http = new GuzzleHttp\Client;
        try {
            $response = $http->post('https://api.uupt.work', [
                'form_params' => [
                    'appid' => OaServiceProvider::setting('app_id'),
                    'app_secret' => OaServiceProvider::setting('app_secret'),
                    'grant_type' => 'authorization_code',
                    'code' => $params['code'] ?? '',
                ],
            ]);
            $res = json_decode($response->getBody(), true);
            $accessToken = $res['access_token'];
            return $res;
        } catch (\Exception $runtimeException) {
            throw  new \Exception('登录异常：' . $runtimeException->getMessage());
        }
    }
    
}
