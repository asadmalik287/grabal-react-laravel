<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use Validator;
use App\Models\User;
use App\Models\Subscription;

class StripeController extends Controller
{
    private $stripe;

    public function __construct()
    {
        $stripe_configuration = Config::get('stripe');
        $this->stripe = new \Stripe\StripeClient(Config::get('stripe')['stripe_sk']);

    }

    public function store(Request $request){
        $validations = Validator::make($request->all(),[
            'amount'=>'required',
            'stripeToken'=>'required',
        ]);

        if($validations->fails()){
            return response()->json(['success'=>false,"errors"=>$validations->errors()]);
        }

         // $customer = $this->stripe->customers->create([
        //     'name'=>"muhammadWaseem",
        //     'email' => 'waseem@ewdtech.com'
        // ]);

        // return $customer;
        $errorCheck = false;
        $errorArray = [];
        try {

            $user = User::find($request->id);
            if($user!=null){
                if($user->stripe_id==''){
                    $user->stripe_id = $this->stripe->customers->create([
                        'name'=>$user->name,
                        'email' => $user->email,
                        'source' => $request->stripe_token,
                    ])->id;
                    $user->save();
                }

                if($user->stripe_id!='' && Subscription::where(['user_id',$user->id])->first()!=null){
                    $errorArray['type'] = ["duplication"];
                    $errorArray['message'] = ["You have already subscribed"];
                    return response()->json(['success'=>false,"errors"=>$errorArray]);
                }

                $product = $this->stripe->products->create([
                    'name' => $user->name,
                    'type' => 'service',
                ]);

                $price = $this->stripe->prices->create([
                    'unit_amount' => $request->amount,
                    'currency' => 'nzd',
                    'recurring' => ['interval' => 'month'],
                    'product' => $product->id,
                ]);
        
                // $plan = $this->stripe->plans->create([
                //     'product' => $product->id,
                //     'interval' => 'month',
                //     'currency' => 'eur',
                //     'amount' => 560,
                // ]);
        
                $subscription = $this->stripe->subscriptions->create([
                    'customer' => $user->stripe_id,
                    'items' => [['price' => $price->id]],
                ]);
                $subscription = Subscription::create(['user_id'=>$user->id,'stripe_id'=>$user->string_id,'name'=>"test",'stripe_price'=>$price->id,'stripe_status'=>$subscription->status,'trial_end_at'=>$subscription->trial_end,'quantity'=>1]);
                if($subscription!=null){
                    return        ()->json(['success'=>true]);
                }
            }

        } catch (\Stripe\Error\ApiConnection $e) {
            $errorArray['type'] = [$e->getError()->type];
            $errorArray['message'] = [$e->getError()->message];
            $errorCheck = true;
        } catch (\Stripe\Exception\CardException $e) {
            $errorArray['type'] = [$e->getError()->type];
            $errorArray['message'] = [$e->getError()->message];
            $errorCheck = true;
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            $errorArray['type'] = [$e->getError()->type];
            $errorArray['message'] = [$e->getError()->message];
            $errorCheck = true;
        } catch(\Stripe\Exception\ApiConnectionException $e){
            $errorArray['type'] = [$e->getError()->type];
            $errorArray['message'] = [$e->getError()->message];
            $errorCheck = true;
        }catch (Exception $e) {
            $errorArray['type'] = [$e->getError()->type];
            $errorArray['message'] = [$e->getError()->message];
            $errorCheck = true;
        }

        if($errorCheck){
            return response()->json(['success'=>false,"errors"=>$errorArray]);
        }

        return response()->json(['success'=>true]);
    }
}
