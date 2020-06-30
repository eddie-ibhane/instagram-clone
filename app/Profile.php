<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];

    public function user(){

        return $this->belongsTo(User::class);
    }

    // public function profileImage()
    // {
    //     return ($this->image) ? '/storage/' . $this->image : '/storage/profile/pPbEyZaym2sBDTEU2NsHaaJnIRLQCOhfiQjW8p64.jpeg' ;
    // }
    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profile/pPbEyZaym2sBDTEU2NsHaaJnIRLQCOhfiQjW8p64.jpeg' ;

        return '/storage/' .$imagePath;
    }

    public function followers(){
        return $this->belongsToMany(User::class);
    }

}
