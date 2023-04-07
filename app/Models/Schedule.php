<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'user_id',
        'venue',
        'date',
        'start_time',
        'end_time',
        'play_type_id',
        'player_type_id',
        'contact_person_name',
        'contact_number',
        'contact_email',
        'max_player',
    ];
    public function playerType(){
        return $this->belongsTo(PlayerType::class);
    }
    public function playType(){
        return $this->belongsTo(PlayType::class);
    }
    public function image(){
        return $this->morphOne(Image::class, 'imageable');
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
    public function registerSchedules(){
        return $this->hasMany(RegisterSchedule::class);
    }
    public function schedulePlayers(){
        return $this->hasMany(SchedulePlayer::class);
    }
    public function scopeSearchBar($query, array $filters){
        //title
        //description
        //contact person
        if(!empty($filters['search_bar'])){
            $query->where('title', 'like', '%'.$filters['search_bar'].'%')->orWhere('description', 'like', '%'.$filters['search_bar'].'%')->orWhere('contact_person_name', 'like', '%'.$filters['search_bar'].'%')->get();
        }
    }
    public function scopeNonExpired($query){
        $query->where('date', '>=', date('Y-m-d'))->get();
    }
}
