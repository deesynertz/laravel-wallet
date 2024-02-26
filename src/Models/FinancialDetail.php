<?php

namespace Deesynertz\Wallet\Models;

use Deesynertz\Wallet\Models\Channel;
use Deesynertz\Wallet\Models\Financial;
use Illuminate\Database\Eloquent\Model;
use Deesynertz\Wallet\Models\FinancialUnitable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinancialDetail extends Model
{
    use HasFactory;

    protected $guarded  = ['id'];
    protected $casts    = ['units' => 'array'];

    const COMMISSION    = 'Commission';
    const SERVICES      = 'Services';
    const SERVING_ACC   = 'Saving Acc';
    const RECEIVE_ALL   = 'All';

    const ACCOUNTABLE_PURPOSES = [FinancialDetail::SERVICES,FinancialDetail::COMMISSION,FinancialDetail::SERVING_ACC ,FinancialDetail::RECEIVE_ALL];

    public function channel()
    {
        return $this->belongsTo(Channel::class);
    }

    public function financial()
    {
        return $this->belongsTo(Financial::class);
    }

    public function financialUnitables()
    {
        return $this->hasMany(FinancialUnitable::class, 'financial_detail_id', 'id');
    }
}
