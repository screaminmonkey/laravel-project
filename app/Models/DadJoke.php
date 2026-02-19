<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DadJoke extends Model
{
    protected $fillable = ['joke', 'comment','user_id'];

}
