<?php

namespace App\Models;
use App\Models\Book;
use App\Models\Borrow;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reader extends Model
{
    use HasFactory;
    public function borrows(){
        return $this->hasMany(Borrow::class);
    }
}
