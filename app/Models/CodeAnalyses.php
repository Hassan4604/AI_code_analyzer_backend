<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodeAnalyses extends Model
{
    protected $fillable = [
      'user_id',
      'code',
      'language',
      'review',
      'improvements',
      'rating'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
