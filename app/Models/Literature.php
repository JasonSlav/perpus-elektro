<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Literature extends Model {
    protected $fillable = ['title', 'author', 'publisher', 'year', 'type', 'file_url', 'stock'];
}
