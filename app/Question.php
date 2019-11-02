<?php

namespace App;
//for using string
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //Defining attributes for mass assignments
    protected $fillable=['title', 'body'];

    //Defining relationship of question with users
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value){
        $this->attributes['title']=$value;
        $this->attributes['slug']=Str::slug($value);
    }

    public function getUrlAttribute(){
        return route("questions.show", $this->id);

    }

    public function getCreatedDateAttribute(){
        return $this->created_at->diffForHumans();
}

    public function getStatusAttribute(){
    if($this->answers > 0){
        if($this->best_answer_id){
            return "answered_accepted";
        }
        return "answered";
    }
    return "unanswered";
}

}