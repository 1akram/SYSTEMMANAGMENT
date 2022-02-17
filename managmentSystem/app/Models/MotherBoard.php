<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MotherBoard extends Model
{
    use HasFactory;
    public function components()
    {
        return $this->belongsToMany(Component::class,'component_mother_board','mother_board_id','component_id');
    }
}
