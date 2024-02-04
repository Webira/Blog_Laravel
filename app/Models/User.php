<?php

namespace App\Models;

use App\Models\Post;
use App\Models\Role;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = "users";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'nickname',
        'email',
        'password',
        
    ];

    /**
     * The attributes that should be hidden for serialization.
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function posts(){
        return $this->hasMany(Post::class);
    }
    public function roles(){
        return $this->belongsToMany(Role::class, 'user_role','user_id', 'role_id');
    }
    public function hasRole($role){
        return $this->roles()->where('name', $role)->first() !==null;
    }
    public function hasAnyRoles($roles){
        return $this->roles()->whereIn('name', $roles)->first() !==null;
    }
    public function getAllRoleNameAttribute(){
        return $this->roles()->implode("name", '|');
    }
    function role() { return $this->belongsTo(Role::class); }
    
}
