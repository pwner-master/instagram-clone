<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded =[];
    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : '/profile/b3iTm7Twl4bJLFXLROZxyaaF0fxT97QSuMDeiahp.png';

        return '/storage/' . $imagePath;
    }

    public function followers()
    {
    return $this->belongsToMany(User::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
