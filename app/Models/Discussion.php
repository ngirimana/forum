<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'user_id', 'title', 'subject', 'content','slug','channel_id'
    ];
    public function user(){
        return $this->belongsTo('App\Models\User','user_id');
    }
    public function channel(){
        return $this->belongsTo('App\Models\Channel','user_id');
    }
    public function replies(){
        return $this->hasMany('App\Models\Reply');
    }
    public function getRouteKeyName(){
        return 'slug';
    }
    public function scopeFilterByChannels($builder){
        if(request()->query('channel')){
            $channel = Channel::where('slug',request()->query('channel'))->first();
            if($channel){
                return $builder->where('channel_id',$channel->id);
            }
            return $builder;
        }
        return $builder;
    }
}

