<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alter extends Model
{
    use HasFactory;

    // Especifica o nome da tabela associada ao modelo
    protected $table = 'table_users';
}
