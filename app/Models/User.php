<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laratrust\Traits\LaratrustUserTrait;
use App\Models\Area;

class User extends Authenticatable
{
    use LaratrustUserTrait;
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'cnic',
        'address',
        'contact',
        'moto',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function candidateParty()
    {
        return $this->hasOne(CandidateParty::class);
    }

    //relation for areas
    public function areas()
    {
        return $this->belongsToMany(Area::class);
    }
    // Voter areas
    public function voterareas()
    {
        return $this->hasOne(VoterArea::class);   
    }

    public function voters()
    {
        return $this->hasOne(Voter::class);
    }
    public function candidates()
    {
        return $this->hasOne(Candidate::class);
    }
    
}
