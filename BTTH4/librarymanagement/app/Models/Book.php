<?php

namespace App\Models;
use App\Models\Reader;
use App\Models\Borrow;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    public function borrows(){
        return $this->hasMany(Borrow::class);
    }
    //
}
