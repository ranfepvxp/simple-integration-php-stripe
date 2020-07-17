<?php

include("cors.php");    
$stripeFile = 'stripe/init.php';
require_once($stripeFile);

$stripe = new \Stripe\StripeClient(
    'sk_test_51H10TRDfu10vZBAPmdkoC5lCp3jo5f9hPFRmHfM6dEKQvMtcd8Ct4whgdeVAcEMSsbWsYZrKwgBtbzcqmHXMmaAy00LJKPOUb8'
  );
$prodcuts = json_encode($stripe->products->all(['limit' => 3]));
print_r($prodcuts);