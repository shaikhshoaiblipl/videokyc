<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'sale_id','user_id','status','datetime'
    ];

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function sale(){
        return $this->belongsTo(User::class,'sale_id');
    }
}
