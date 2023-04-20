<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cv extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cvs';
    /* protected $fillable = ['profile','contact','education','experience','language','skills','design','id_user']; */
    protected $hidden = ['updated_at'];
    protected $dates = ['deleted_At'];

    /**
     * RelationShips on database
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function relactions_cv(){
        return $this->belongsToMany(Profile::class, Contact::class, Education::class, Experience::class, Language::class, Skills::class, Design::class, "cv_id");
    }

    public function rel_cv()
    {
        return $this->hasMany(Education::class, "cv_id");
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class, 'cv_id');
    }

    public function contact()
    {
        return $this->hasOne(Contact::class);
    }

    public function experience()
    {
        return $this->hasMany(Experience::class);
    }

    public function language()
    {
        return $this->hasMany(Language::class);
    }

    public function skill()
    {
        return $this->hasMany(Skills::class);
    }

    public function design()
    {
        return $this->hasOne(Design::class);
    }
}