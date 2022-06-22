<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    public function users()
    {
        return $this->belongsToMany(Admin::class);
    }

    public function allowTo($permissionId)
    {
    	return $this->permissions()->sync($permissionId);
    }

    public function disallowTo($permissionId)
    {
    	return $this->permissions()->detach($permissionId);
    }
}
