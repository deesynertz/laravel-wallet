<?php

namespace Deesynertz\Location\Traits;

use Deesynertz\Wallet\Models\Financial;
use Deesynertz\Wallet\Models\FinancialDetail;

trait FinancialDetailTrait
{
    public function financialDetailObject()
    {
        return FinancialDetail::query();
    }

    public function financialDetailByID(int $id)
    {
        return $this->financialDetailObject()
            ->with('channel')
            ->with('financial')
            ->with('financialUnitables')
            ->withCount(['financialUnitables as financial_unitables_count'])
            ->findOrFail($id);
    }

    public function financialDetailList($page = null)
    {
        return $this->financialDetailObject()
            ->with('channel')
            ->with('financial')
            ->with('financialUnitables')
            ->withCount(['financialUnitables as financial_unitables_count'])
            ->when(is_null($page), 
                fn ($query) => $query->get(),
                fn ($query) => $query->paginate($page)
            );
    }

    public function createFinancialDetail(Financial $financial, array $data)
    {
        // if ((is_array($data) && count($data) > 0 && is_array(current($data)))) {
        //     // Wrap $your Array in an additional array
        //     $items = [$items];
        //     $financial = $financial->financialDetails()->firstOrCreate($data["city_name"]);

        // }
        
        if (!is_null($data) && !empty($data)) {
            return $financial->financialDetails()->firstOrCreate($data);
        }

        return null;
    }
}