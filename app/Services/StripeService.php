<?php


namespace App\Services;


use App\Helpers\GetPriceHelper;
use App\Product;
use Cartalyst\Stripe\Laravel\Facades\Stripe;

class StripeService
{
  public function pay(array $input, Product $product)
  {
    $stripe = Stripe::setApiKey(env('STRIPE_SECRET'));
    $token = $this->getToken($stripe, $input);
    return $this->charge($stripe, $token, GetPriceHelper::getAmount($product, $input['shipping_option']));
  }

  private function getToken($stripe, $input)
  {
    return $stripe->tokens()->create([
      'card' => [
        'number' => $input['card_no'],
        'exp_month' => $input['ccExpiryMonth'],
        'exp_year' => $input['ccExpiryYear'],
        'cvc' => $input['cvvNumber'],
      ],
    ]);
  }

  private function charge($stripe, $token, $amount)
  {
    return $stripe->charges()->create([
      'card' => $token['id'],
      'currency' => 'EUR',
      'amount' => $amount,
      'description' => 'wallet',
    ]);
  }

}
