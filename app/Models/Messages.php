<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Messages extends Model
{
use HasFactory;

    protected $table = "messages";
    protected $fillable = [
        'id', 'sender', 'subject', 'receiver','content','hour','weekday'
    ];
}
