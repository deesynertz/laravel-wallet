<?php

namespace Deesynertz\Wallet\Services;

use Deesynertz\Location\Traits\HasWallets;

class WalletService
{
    use HasWallets;

    # banks | mnos
    public function channelList($page = null, $groupBy = null)
    {
        return $this->channelObject()
            ->with('financialDetails')
            ->when(!is_null($groupBy), fn($sbQuery) => $sbQuery->groupBy($groupBy))
            ->when(is_null($page), 
                fn ($query) => $query->get(),
                fn ($query) => $query->paginate($page)
            );
    }
    

}