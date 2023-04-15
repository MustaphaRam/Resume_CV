<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Cv
{
    use HasFactory;
    protected $table = 'design';

    protected $fillable = [ 'templet','color','size_font','family_font','cv_id'];
}
