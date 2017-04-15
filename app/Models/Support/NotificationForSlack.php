<?php

namespace App\Models\Support;

use Exception;

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

    /**
     * @param Exception $e
     *
     * @return \Illuminate\Support\Collection
     */
    public function createAttachmentOfQueryException(Exception $e)
    {
        $attachment = collect([]);

        $attachment
            ->put('message', $e->getMessage());

        return $attachment;
    }
}
