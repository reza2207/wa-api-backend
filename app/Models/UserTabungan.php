<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserTabungan extends Model
{
    use HasFactory;

    protected $table = "user_tabungan";

    protected $fillable = ['id_user', 'name', 'status'];
}
