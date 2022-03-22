<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
    use HasFactory;
    protectd $fillable = ['user_id','stripe_id','name'=>"test",'stripe_price','stripe_status','trial_ends_at','quantity'];
}
