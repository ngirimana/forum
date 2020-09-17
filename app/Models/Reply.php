<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    use HasFactory;
    protected $fillable = [
        'discussion_id', 'reply_owner', 'contact', 'content',
     ];
     public function discussions(){
        return $this->belongsTo(Discussion::class);
    }
}
