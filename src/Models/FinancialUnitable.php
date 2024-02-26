<?php

namespace Deesynertz\Wallet\Models;

use Illuminate\Database\Eloquent\Model;
use Deesynertz\Wallet\Models\FinancialDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FinancialUnitable extends Model
{
    use HasFactory;
    protected $guarded  = ['id'];

    public function financialDetail()
    {
        return $this->belongsTo(FinancialDetail::class, 'financial_detail_id', 'id')->with('financial');
    }

    public function financialable()
    {
        return $this->morphTo(); // could be Unit|ExtendUnit|House in General
    }
}
