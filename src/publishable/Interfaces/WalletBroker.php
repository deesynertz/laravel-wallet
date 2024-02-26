<?php

namespace Deesynertz\Wallet\Interfaces;

use Closure;

interface WalletBroker
{
    /**
     * Constant representing a .
     *
     * @var string
     */
    const COMMISSION    = 'Commission';
    const SERVICES      = 'Services';
    const SERVING_ACC   = 'Saving Acc';
    const RECEIVE_ALL   = 'All';


    /**
     * Constant representing a .
     *
     * @var array
    */

    const ACCOUNTABLE_PURPOSES = [
        WalletBroker::SERVICES       => WalletBroker::SERVICES,
        WalletBroker::COMMISSION     => WalletBroker::COMMISSION,
        WalletBroker::SERVING_ACC    => WalletBroker::SERVING_ACC,
        WalletBroker::RECEIVE_ALL    => WalletBroker::RECEIVE_ALL,
    ];

    /**
     * Send a password reset link to a user.
     *
     * @param  array  $credentials
     * @param  \Closure|null  $callback
     * @return string
     */
    public function sendResetLink(array $credentials, Closure $callback = null);

    /**
     * Reset the password for the given token.
     *
     * @param  array  $credentials
     * @param  \Closure  $callback
     * @return mixed
     */
    public function reset(array $credentials, Closure $callback);
}
