<?php

include("cors.php");    
$stripeFile = 'stripe/init.php';
require_once($stripeFile);

$stripe = new \Stripe\StripeClient($sk);
$prodcuts = json_encode($stripe->products->all(['limit' => 3]));
print_r($prodcuts);