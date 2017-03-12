<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Support\Collection;

class SlackPosted extends Notification
{
    use Queueable;

    /** @var  bool */
    private $isError;

    private $attachment;

    /**
     * SlackPosted constructor.
     * @param $isError
     * @param Collection $attachment
     */
    public function __construct($isError, Collection $attachment)
    {
        $this->isError = $isError;
        $this->attachment = $attachment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * @param $notifiable
     * @return SlackMessage
     */
    public function toSlack($notifiable)
    {
        $slackMessage = new SlackMessage;

        if (!$this->isError) {
            $slackMessage->success();
        } else {
            $slackMessage->error();
        }

        return $slackMessage
            ->attachment(function ($attachment) {
                $attachment
                    ->fields($this->attachment->all());
            });
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
