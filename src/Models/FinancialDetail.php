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

    public const COMMISSION    = 'Commission';
    public const SERVICES      = 'Services';
    public const SERVING_ACC   = 'Saving Acc';
    public const RECEIVE_ALL   = 'All';
    public const ACCOUNTABLE_PURPOSES = [self::SERVICES,self::COMMISSION,self::SERVING_ACC ,self::RECEIVE_ALL];


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
