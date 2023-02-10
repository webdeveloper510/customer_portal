<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Stripe;
use Session;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    public function loadRegister(){
        return view('register');
    }
    
    public function stripePost(Request $request){
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = Stripe\Customer::create(array(
                'email' => $request->email_address,
                'name' => $request->contact_name,
                'description' => 'Test Customer',
                'source' => $request->stripeToken
             ));
    
    //   echo "<pre>";
    //   print_r($customer);die;
    
    
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $payment_method = $stripe->paymentMethods->create([
            'type' => 'card',
            'card' => [
            'number' => $request->card_number,
            'exp_month' => $request->expiry_month,
            'exp_year' => $request->expiry_year,
            'cvc' => $request->cvc,
            
          ],
        ]);
        
        // echo "<pre>";
        // print_r($payment_method);die;
    
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
           $payment =  $stripe->paymentIntents->create([
              'amount' => $request->amount,
              'currency' => 'inr',
              'customer' => $customer->id,
              'description' => $customer->description,
              'payment_method' => $payment_method->id,
            ]);
            // echo "<pre>";
            // print_r($payment);
            
         }
    }
