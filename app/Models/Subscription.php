<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protected $fillable = ['user_id','stripe_id','stripe_subscription_id','stripe_price_id','stripe_subscription_status','trial_ends_at','quantity'];
}
