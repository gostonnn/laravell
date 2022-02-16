<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Szalami extends Model
{
    use HasFactory;

    protected $filltable = [
        "név",
        "ár",
        "típus",
        "lejárati_idő"
    ];
}
