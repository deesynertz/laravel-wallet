<?php

namespace Deesynertz\Location\Traits;

use Deesynertz\Wallet\Models\Channel;

trait ChannelTrait
{
    public function channelObject()
    {
        return Channel::query();
    }

    public function channelByID(int $id)
    {
        return $this->channelObject()
            ->with('financialDetails')
            ->findOrFail($id);
    }

    public function createChannel(array $data)
    {
        if (!is_null($data) && !empty($data)) {
            return $this->channelObject()->firstOrCreate($data);
        }

        return null;
    }
}