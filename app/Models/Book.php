<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Table;
use Illuminate\Database\Eloquent\Model;
#[Fillable('title' , 'author' , 'publication_year' )]
#[Table('books')]
class Book extends Model
{
    //
}
