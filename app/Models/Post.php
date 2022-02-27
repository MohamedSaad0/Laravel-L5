<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // I have to add a property that allows me to add to the DB this is for security reasons

    protected $fillable = ["title","description","user_id","email","name"];
    // Using this created_at value wont be sent (hidden)
    // protected $hidden = ["created_at"];

    // creating a function to specify the relationship between Post N User (belongsTo= One)
    public function user(){
        return $this->belongsTo(User::class);
    }

}
