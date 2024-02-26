<?php

use Deesynertz\Wallet\Services\WalletService;


if (!function_exists('isAttchedAccToUnit')) {
    function isAttchedAccToUnit($attchedAccs, $existAccount)
    {
        foreach ($attchedAccs as $attchedAcc) {
            if ($attchedAcc->financial_detail_id == $existAccount->id) {
                return true;
            }
        }
    }
}

if (!function_exists('getPaymentChannels')) {
    function getPaymentChannels($page = null, $groupBy = null)
    {
        return (new WalletService())->channelList($page, $groupBy);
    }
}

if (!function_exists('getAllChannels')) {
    function getAllChannels()
    {
        return (new WalletService())->channelList();
    }
}