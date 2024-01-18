<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;
    protected $table = 'tests'; // Make sure the table name matches your database table
    protected $fillable = ['name', 'phone'];
}
