<?php

namespace App\Application\Tests\Controller;

use App\Application\Tests\TestCase;

abstract class BaseController extends TestCase
{
    protected $token = null;

    /**
     * @param string $path
     * @param array  $param
     * @param bool   $auth
     *
     * @return string
     */
    protected function generateV1Url(string $path, array $param = [], $auth = true): string
    {
        $url = app('api.url')->version('v1')->route($path, $param);

        if ($auth) {
            $url = $url.'?token='.$this->token;
        }

        return $url;
    }

    protected function signIn()
    {
        $data = [
            'fb_id'   => '1_testUser',
            'fb_name' => '1_testUser',
        ];
        $this->post(app('api.url')->version('v1')->route('auth.fb_login'), $data);

        $content = json_decode($this->response->getContent());

        $this->assertObjectHasAttribute('token', $content, 'Token does not exists');
        $this->token = $content->token;

        return $this;
    }
}
