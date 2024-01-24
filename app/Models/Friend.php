<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Friend extends Model
{
    use HasFactory;
    protected $table = 'friends'; // Make sure the table name matches your database table
    protected $fillable = [
        'user_id', 'friend_id'
    ];

    public function friend(){
        return $this->belongsTo(User::class);
    }
}
