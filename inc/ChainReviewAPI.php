<?php

namespace Inc;

if(!function_exists('start')) :
    header('Status: 403 Forbidden');
    header('HTTP/1.1 403 Forbidden');
    exit();
endif;

use GuzzleHttp;

class ChainReviewAPI
{
    function __construct() {
        $this->client = new GuzzleHttp\Client();
        $this->uri = 'https://chain.review/api/db/dogecash/';
    }

    public function getWalletStats() {
        $request = $this->client->request('GET', $this->uri . '/getstats');
        return json_decode($request->getBody(), true); 
    }
}