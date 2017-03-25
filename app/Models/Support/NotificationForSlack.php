<?php

namespace App\Models\Support;

trait NotificationForSlack
{
    /**
     * Slackチャンネルに対する通知をルートする.
     *
     * @return string
     */
    public function routeNotificationForSlack()
    {
        return config('config.ErrorOfSlackWebhookUrl');
    }
}
