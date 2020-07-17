<?php

include("cors.php");    
$stripeFile = 'stripe/init.php';
require_once($stripeFile);

$stripe = new \Stripe\StripeClient($sk);

$prices = json_encode($stripe->prices->all(['limit' => 3]));
print_r($prices);

