<?php

namespace App\Models;
use App\Models\Book;
use App\Models\Reader;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    use HasFactory;
    public function book(){
        return $this->belongsTo(Book::class);
    }
    public function reader(){
        return $this->belongsTo(Reader::class);
    }
}
