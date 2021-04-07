<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auto extends Model
{
    use HasFactory;
    protected $fillable = ['city','brand','model','color','issue_year','mileage','price','seller_name','seller_phone','img','fuel_id','transmission_id','type_id','user_id','description'];
}
