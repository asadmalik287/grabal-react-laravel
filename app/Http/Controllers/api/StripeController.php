<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use Validator;
use App\Models\User;
use App\Models\Subscription;
use Illuminate\Support\Facades\Storage;

class StripeController extends Controller
{
    private $stripe;
    public function __construct()
    {
        $stripe_configuration = Config::get('stripe');
        $this->stripe = new \Stripe\StripeClient(Config::get('stripe')['stripe_sk']);

    }

    public function store(Request $request){
        // $webhook = $this->stripe->webhookEndpoints->create([
        //     'url' => 'https://ewdtech.com/ewdtech/test/grobal_react/api/stripeWebhook',
        //     'enabled_events' => [
        //       'invoice.payment_succeeded'
        //     ]
        // ]);
        // return $webhook;
        // return $request->all();
        $validations = Validator::make($request->all(),[
            'user_id'=>"required",
            'amount'=>'required',
            'stripeToken'=>'required',
        ]);

        if($validations->fails()){
            return response()->json(['success'=>false,"errors"=>$validations->errors()]);
        }

        $errorCheck = false;
        $errorArray = [];
        try {

            $user = User::find($request->user_id);
            if($user!=null){
                if($user->stripe_id==''){
                    $user->stripe_id = $this->stripe->customers->create([
                        'name'=>$user->name,
                        'email' => $user->email,
                        'source' => $request->stripeToken,
                    ])->id;
                    $user->save();
                }

                if($user->stripe_id!='' && Subscription::where('user_id',$user->id)->where('stripe_subscription_status','active')->first()!=null){
                    $errorArray['type'] = ["duplication"];
                    $errorArray['message'] = ["You have already subscribed"];
                    return response()->json(['success'=>false,"errors"=>$errorArray]);
                }

                $product = $this->stripe->products->create([
                    'name' => $user->name,
                    'type' => 'service',
                ]);

                // return $product;
                $price = $this->stripe->prices->create([
                    'unit_amount' => $request->amount*100,
                    'currency' => 'nzd',
                    'recurring' => ['interval' => 'day'],
                    'product' => $product->id,
                ]);

                // $plan = $this->stripe->plans->create([
                //     'product' => $product->id,
                //     'interval' => 'month',
                //     'currency' => 'nzd',
                //     'amount' => 30,
                // ]);

                $subscription = $this->stripe->subscriptions->create([
                    'customer' => $user->stripe_id,
                    'items' => [['price' => $price->id]],
                ]);

                $subscription = Subscription::create(['user_id'=>$user->id,'stripe_id'=>$user->stripe_id,'stripe_subscription_id'=>$subscription->id,'stripe_price_id'=>$price->id,'stripe_subscription_status'=>$subscription->status,'trial_ends_at'=>$subscription->trial_end,'quantity'=>1]);
                if($subscription!=null){
                    return response()->json(['success'=>true, "message"=>"Thanks! You have subscribed successfully"]);
                }
            }else{
                return response()->json(['success'=>false, "message"=>"User doesn't exist"]);
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

        return response()->json(['success'=>false, "message"=>"Sorry! Something went wrong."]);
    }

    // cancel stripe subscription
    public function stripeSubscriptionCancel($id){
        $errorCheck = false;
        $errorArray = [];
        try {
            $subscription = $this->stripe->subscriptions->cancel($id);
            $subscriptionUpdate = Subscription::where("stripe_subscription_id",$subscription->id)->update(['stripe_subscription_status'=>$subscription->status]);
            if($subscriptionUpdate){
                Subscription::where("stripe_subscription_id", $subscription->id)->delete();
                return response()->json(['success'=>true, "message"=>"Thanks! Your subscription has been canceled successfully"]);
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
    }

    // stripe web hook for renewal of subscription
    public function stripeWebhook()
    {
        header('Access-Control-Allow-Origin: *');
        $payload_d = @file_get_contents('php://input');
        Storage::put('files.txt',$payload_d);
        $payload = json_decode($payload_d, true);
        if(isset($payload['type']) && $payload['type']=="invoice.payment_succeeded"){
            // for subscription update
            if($payload['data']['object']['billing_reason']=="subscription_cycle"){
                $subId = $payload['data']['object']['subscription'];
                $subscription = Subscription::where("stripe_subscription_id",$subId)->update(['stripe_subscription_status'=>'active']);
            }
        }
    }
}
