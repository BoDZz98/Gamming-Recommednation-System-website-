<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_lists_table extends Model
{
    use HasFactory;
    
    public $table='user_lists';

    protected $fillable = [
        'list_id',
        'user_id',
        'list_name',
        'list_description',
        'list_image_path',
    ];

}
