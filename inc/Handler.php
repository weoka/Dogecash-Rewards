<?php

namespace Inc;

if(!function_exists('start')) :
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
endif;

use Inc\ChainReviewAPI;

class Handler
{
    function __construct()
    {
        $chainAPI = new ChainReviewAPI();

        $this->moneySupply = $chainAPI->getWalletStats()['money_supply'];
        $this->masternodes = $chainAPI->getWalletStats()['masternodesCount'];
    }
}