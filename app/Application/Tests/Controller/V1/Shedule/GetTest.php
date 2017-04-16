<?php

namespace App\Application\Tests\Controller\V1;

use App\Application\Tests\Controller\BaseController;

class GetTest extends BaseController
{
    public function test_scheduleIndex()
    {
        $this->signIn();

        $this->get($this->generateV1Url('schedules.index'))
            ->assertResponseOk();
    }

    public function test_scheduleShow()
    {
        $this->signIn();

        $this->get($this->generateV1Url('schedules.show', ['schedule' => 1]))
            ->assertResponseOk();
    }
}
