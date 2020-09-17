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
        return $this->belongsTo(User::class,'user_id');
    }
}
