<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Cv
{
    use HasFactory;
    protected $table = 'skills';

    protected $fillable = ['name','level','cv_id'];
}
