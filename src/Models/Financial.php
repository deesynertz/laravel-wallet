<?php

namespace Deesynertz\Wallet\Models;

use Illuminate\Database\Eloquent\Model;
use Deesynertz\Wallet\Models\FinancialDetail;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Financial extends Model
{
    use HasFactory;
    protected $guarded  = ['id'];
 
    public function financialable()
    {
        return $this->morphTo(); // could be Account/Company
    }

    public function financialDetails()
    {
        return $this->hasMany(FinancialDetail::class)->with('financial');
    }
}
