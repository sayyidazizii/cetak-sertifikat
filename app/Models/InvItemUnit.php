<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvItemUnit extends Model
{
    use HasFactory;   
    protected $guarded=['item_unit_id'];
}
