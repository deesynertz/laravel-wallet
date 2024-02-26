<?php

return [
    'models' => [
        /*
         * When using the "HasPermissions" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your permissions. Of course, it
         * is often just the "Permission" model but you may use whatever you like.
         *
         */

        'channels' => Deesynertz\Wallet\Models\Channel::class,

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your roles. Of course, it
         * is often just the "Role" model but you may use whatever you like.
         * 
         */

        'financials' => Deesynertz\Wallet\Models\Financial::class,

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your roles. Of course, it
         * is often just the "Role" model but you may use whatever you like.
         * 
         */

        'financial_details' => Deesynertz\Wallet\Models\FinancialDetail::class,

         /*
         * When using the "HasWallets" trait from this package, we need to know which
         * Eloquent model should be used to retrieve your roles. Of course, it
         * is often just the "Role" model but you may use whatever you like.
         * 
         */

        'financial_unitables' => Deesynertz\Wallet\Models\FinancialUnitable::class,
    ],

    'table_names' => [

        /*
         * When using the "HasRoles" trait from this package, we need to know which
         * table should be used to retrieve your roles. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'channels' => 'channels',

        /*
         * When using the "HasWallets" trait from this package, we need to know which
         * table should be used to retrieve your permissions. We have chosen a basic
         * default value but you may easily change it to any table you like.
         */

        'financials' => 'financials',

        /*
         * When using the "HasWallets" trait from this package, we need to know which
         * table should be used to retrieve your models permissions. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'financial_details' => 'financial_details',

        /*
         * When using the "HasWallets" trait from this package, we need to know which
         * table should be used to retrieve your models roles. We have chosen a
         * basic default value but you may easily change it to any table you like.
         */

        'financial_unitables' => 'financial_unitables',
    ],

    'column_names' => [
        /*
         * Change this if you want to name the related pivots other than defaults
         */
        'channel_key' => 'channel_id',
        'financial_key' => 'financial_id',
        'financial_detail_key' => 'financial_detail_id',
        'financialable_type' => 'financialable_type',
        'financialable_id' => 'financialable_id',
    ],
];