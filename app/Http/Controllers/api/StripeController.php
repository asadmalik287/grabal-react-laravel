<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Config;
use Validator;

class StripeController extends Controller
{
    public function store(Request $request){
        
        $validations = Validator::make($request->all(),[
            'amount'=>'required',
            'stripeToken'=>'required',
        ]);

        if($validations->fails()){
            return response()->json(['success'=>false,"errors"=>$validations->errors()]);
        }

        $stripeConfig = Config::get('stripe');
        $stripe = new \Stripe\StripeClient($stripeConfig['stripe_sk']);
        $errorCheck = false;
        $errorArray = [];
        $total=4;
        try {

            $charge = $stripe->charges->create([
                "amount" => 100 * $total,
                "currency" => "usd",
                "source" => $request->stripeToken,
                "receipt_email"=>"test@gmail.com",
                "description" =>"this is test",
            ]);

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
