<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
    use HasFactory;
    protected $table = 'design';
    protected $fillable = [ 'templet','color','size_font','family_font','cv_id'];
    protected $hidden = ['created_at','updated_at'];


    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
