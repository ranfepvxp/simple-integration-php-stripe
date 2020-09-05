<?php

    include("cors.php");
    $stripeFile = 'stripe/init.php';
    require_once($stripeFile);
   
    $object = [
        'amount_off' => 10000,  
        'currency' => 'mxn',
        'duration' => 'once'
    ];


    try {     
        $stripe = new \Stripe\StripeClient($sk);
        $response = json_encode($stripe->coupons->create($object));
        print_r($response);
    } catch (Exception $e) {
        $eJson = json_encode($e);
        print_r($eJson);
    }
        
?>