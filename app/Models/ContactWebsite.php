<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactWebsite extends Model
{
    use HasFactory;
    protected $table= 'contact_website';
    protected $guarded = ['id'];
}
