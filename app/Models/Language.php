<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    use HasFactory;

    protected $table = 'language';
    protected $fillable = ['language_name','level','cv_id'];
    protected $hidden = ['created_at','updated_at'];

    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
