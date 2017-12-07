<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class GithubEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Array to store the attributes on Github Event call
     *
     * @var
     */
    private $body;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(array $attributes)
    {
        $this->body = $attributes;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    /**
     * Get the event type from payload
     *
     * @return string
     */
    public function getAction(): string
    {
        return $this->body['action'];
    }

    /**
     * Get the release tarball reference
     *
     * @return string
     */
    public function getReleaseTarballUrl(): string
    {
       return $this->body['release']['tarball_url'];
    }
}
