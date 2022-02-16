<?php

class OrangeMoney{
    private $authorization_header = "";
    private $marchant_key = "";
    private $amount = "";
    private $order_id = "";

    public function __construct($amount , $order_id)
    {
        $this->amount = $amount;
        $this->order_id = $order_id;
    }

    // Recupere le token generer par orange
    public function getAccessToken(){
        // $ch = curl_init(url: 'https://api.orange.com/oauth/v2/token');
        $ch = curl_init(url(), 'https://api.orange.com/oauth/v2/token');
    }
}