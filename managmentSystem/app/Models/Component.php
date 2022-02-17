<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Component extends Model
{
    use HasFactory;
    public function motherBoards()
    {
        return $this->belongsToMany(MotherBoard::class,'component_mother_board','component_id','mother_board_id');
    }
}
