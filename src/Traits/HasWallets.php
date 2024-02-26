<?php

namespace Deesynertz\Location\Traits;

use Deesynertz\Location\Traits\ChannelTrait;
use Deesynertz\Location\Traits\FinancialTrait;
use Deesynertz\Location\Traits\FinancialDetailTrait;
use Deesynertz\Location\Traits\FinancialUnitableTrait;


trait HasWallets
{
    use ChannelTrait;
    use FinancialTrait;
    use FinancialDetailTrait;
    use FinancialUnitableTrait;


    
}