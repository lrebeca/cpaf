<?php

namespace App\Models;

use App\Models\Admin\Event;
use App\Models\Exhibitor;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

use Spatie\Permission\Traits\HasRoles;
use Symfony\Component\HttpKernel\Profiler\Profile;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];


    // metodo para poder recuperar la foto de perfil del usuario

    public function adminlte_image()
    {
        return 'https://picsum.photos/300/300';
    }

    // Metodo para poder recuperar el rol del usuario

    public function adminlte_desc()
    {
        return "Administrador";
    }

    // Para el perfil del usuario 

    public function adminlte_profile_url()
    {
        return 'profile.show';
    }

    //Relacion uno a muchos con events

    public function events(){
        return $this->hasMany(Event::class);
    }

    // Relacion muchos a muchos con events

    public function event_user(){
        return $this->belongsToMany(Event::class)->withTimestamps(); 
    }

    //relacion uno a uno con profile

    public function profile(){
        return $this->hasOne(Profile::class);
    }

}
