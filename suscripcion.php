<?php
  
    include("cors.php");
    $stripeFile = 'stripe/init.php';
    require_once($stripeFile);

    $post = $_POST;
    $customerId = $post["customerId"];
    $paymentMethodId = $post["paymentMethodId"];
    $priceId = $post["priceId"];
    $code = $post["code"];



    try {
        $payment_method =  \Stripe\PaymentMethod::retrieve(
          $paymentMethodId
        );
        $payment_method->attach([
          'customer' => $customerId,
        ]);
      } catch (Exception $e) {
            $customerJson = json_encode($e); 
            print_r($customerJson);
      }
    
      try{
    
      // Set the default payment method on the customer
      \Stripe\Customer::update($customerId, [
        'invoice_settings' => [
          'default_payment_method' => $paymentMethodId
        ]
      ]);
    
      // Create the subscription
      $subscription = \Stripe\Subscription::create([
        'customer' => $customerId,
        'items' => [
          [
            'price' => $priceId,
          ],
        ],
        'coupon' => $code,
        'expand' => ['latest_invoice.payment_intent'],
      ]);

    $suscriptionJson = json_encode($subscription);    
    print_r($suscriptionJson);
  
      } catch (Exception $e) {
        $customerJson = json_encode($e); 
        print_r($customerJson);
      }
      

?>