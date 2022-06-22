<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Storage;

class Item extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function trolleys()
    {
        return $this->hasMany(Trolley::class);
    }

    public function getItemPhoto()
    {
        $photo = $this->item_photo_path;
        if ($this->item_photo_path && Storage::disk('public')->exists('foto_barang/'.$photo)) {
            return asset('storage/foto_barang/' . $this->item_photo_path);
        }

        return $this->defaultItemPhoto();
    }

    protected function defaultItemPhoto()
    {
        return 'https://i.ibb.co/6JBKxG7/minimal-avatars-1.png';
    }
}
