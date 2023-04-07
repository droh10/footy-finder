<?php

namespace App\Models;

use App\Models\ScheduleDetail;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PlayerType extends Model
{
    use HasFactory;
    public function schedules(){
        return $this->hasMany(Schedule::class);
    }
}
