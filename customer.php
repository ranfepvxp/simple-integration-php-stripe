<?php
    include("cors.php");
    $stripeFile = 'stripe/init.php';
    require_once($stripeFile);


    $post = $_POST;
    $email = $post["email"];
    $name = $post["name"];

    $customer = \Stripe\Customer::create([
        'email' => $email,
        'name' => $name
    ]);

    $customerJson = json_encode($customer);
    print_r($customerJson);
  
?>