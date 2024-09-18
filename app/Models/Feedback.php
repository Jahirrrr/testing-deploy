<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = ['nama', 'email', 'comment'];
    protected $table = 'feedbacks';
}
