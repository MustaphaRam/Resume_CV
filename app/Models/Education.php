<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    use HasFactory;

    protected $table = 'education';
    protected $fillable = [ 'certificate','institute_name','Specialty_name','date_obtaining','description','cv_id'];
    protected $hidden = ['created_at','updated_at'];

    public function cv()
    {
        return $this->belongsTo(Cv::class, 'cv_id');
    }
}
