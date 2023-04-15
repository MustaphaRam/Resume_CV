<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Cv
{
    use HasFactory;

    protected $table = 'language';

    protected $fillable = ['language_name','level','cv_id'];
}
