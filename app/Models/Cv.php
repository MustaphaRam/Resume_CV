<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cv extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cvs';
    
    protected $fillable = ['profile','contact','education','experience','language','skills','design','id_user'];

    protected $dates = ['deleted_At'];
}
