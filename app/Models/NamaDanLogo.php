<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NamaDanLogo extends Model
{
    use HasFactory;
    protected $table ='nama_dan_logo';
    protected $guarded =['id'];
}
