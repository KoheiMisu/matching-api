<?php

namespace App\Application\Tests\Controller\V1;

use App\Application\Tests\Controller\BaseController;

class AuthTest extends BaseController
{
    public function test_getUser()
    {
        $this->signIn();

        $this->call('GET', '/api/v1/auth/authenticated_user', ['token' => $this->token], $cookies = [], $files = [], $server = []);

        $this->get($this->generateV1Url('auth.get_user'))
            ->assertResponseOk();
    }
}
