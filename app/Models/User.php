<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Storage;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }

    public function assignRole($role)
    {
        $this->roles()->toggle($role);
    }

    public function syncRole($role)
    {
        $this->roles()->sync($role);
    }

    public function permissions()
    {
        return $this->roles->map->permissions->flatten()->pluck('permission_name')->unique();
    }

    public function toko()
    {
        return $this->hasOne(Store::class);
    }

    public function assignToko($store)
    {
        $this->toko()->toggle($store);
    }

    public function trolleys()
    {
        return $this->hasMany(Trolley::class);
    }

    public function myCart()
    {
        return $this->trolleys->map->item->flatten();
    }

    public function photoProfile()
    {
        $photo = $this->profile_photo_path;
        if ($this->profile_photo_path && Storage::disk('public')->exists('photo_profile/'.$photo)) {
            return asset('storage/photo_profile/' . $this->profile_photo_path);
        }

        return $this->defaultPhotoProfile();
    }

    protected function defaultPhotoProfile()
    {
        return 'https://i.ibb.co/6JBKxG7/minimal-avatars-1.png';
    }
}
