<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Profile extends Model
{
    use HasFactory, Notifiable;
    protected $table = 'profile';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
     protected $fillable = [
        'name',
        'lastname',
        'date_birth',
        'gender',
        'image_profile',
        'situation_family',
        'country',
        'my_profile',
        'hobbies'
    ];
    protected $hidden = ['created_at','updated_at'];
} 
