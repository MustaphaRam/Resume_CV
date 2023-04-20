<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    use HasFactory;

    protected $table = 'experience';
    protected $fillable = ['name_post','name_company','start_date','end_date','city','description','cv_id'];
    protected $hidden = ['created_at','updated_at'];


    public function cv()
    {
        return $this->belongsTo(Cv::class);
    }
}
