<?php

    include("cors.php");
    $stripeFile = 'stripe/init.php';
    require_once($stripeFile);
    
    $post = $_POST;
    $jsonDecode = json_decode($post['token']);
    $tokenId = $jsonDecode->id;
    $amount = $post['amount'];
    $name = $post['name'];
    
    $chargeObject = [
        'amount' => $amount * 100,
        'currency' => 'mxn',
        'description' => $name,
        'source' => $tokenId,
    ];

    try {
        $charge = \Stripe\Charge::create($chargeObject);  
        $chargeJson = json_encode($charge);
        print_r($chargeJson);
    } catch (Exception $e) {
        $eJson = json_encode($e);
        print_r($eJson);
    }
        
?>