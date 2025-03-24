<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneBrand extends Model
{
    use HasFactory;
    protected $table = 'phonebrand';
    protected $primaryKey = 'pbid';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'country',
        'logo'
    ];

}
