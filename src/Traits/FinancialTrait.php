<?php

namespace Deesynertz\Location\Traits;

use Deesynertz\Wallet\Models\Financial;

trait FinancialTrait
{
    public function financialObject()
    {
        return Financial::query();
    }


    public function financialByID(int $id)
    {
        return $this->financialObject()
            ->with('financialable')
            ->with('financialDetails')
            ->findOrFail($id);
    }

    public function financialList($page = null)
    {
        return $this->financialObject()
            ->with('financialable')
            ->with('financialDetails')
            ->when(is_null($page), 
                fn ($query) => $query->get(),
                fn ($query) => $query->paginate($page)
            );
    }

    public function createFinancial(array $data, $target = null)
    {
        if (!is_null($data) && !empty($data)) {
            if (is_null($target)) {
                $financial = $this->financialObject()->firstOrCreate($data);
            } else {
                $financial = $target->financialable->firstOrCreate($data);
            }
            return $financial;
        }

        return null;
    }

    
}