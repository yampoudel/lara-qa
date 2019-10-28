<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //Defining attributes for mass assignments
    protected $fillable=['title', 'body'];

    //Defining relationship of question with users
    public function user(){
        return $this->belongTo(User::class);
    }

   
}
