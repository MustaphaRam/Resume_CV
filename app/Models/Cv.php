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
    protected $fillable = ['profile','contact','education','experience','language','skills','design','id_user'];
    protected $hidden = ['updated_at'];
    protected $dates = ['deleted_At'];

    /**
     * RelationShips on database
     */
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    
    public function relactions(){
        return $this->hasManyThrough(Profile::class, Contact::class, Education::class, Experience::class, Language::class, Skills::class, Design::class, "cv_id");
    }
}
