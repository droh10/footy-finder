<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\PlayType;
use App\Models\Schedule;
use App\Models\PlayerType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\StoreSchedule;
use App\Http\Requests\UpdateSchedule;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class ScheduleController extends Controller
{
   public function list()
   {
        $schedules = Schedule::searchBar(request(['search_bar']))->nonExpired()->orderBy('date', 'desc')->withCount('registerSchedules')->paginate(10);
        foreach($schedules  as &$rows){
            $rows['time_schedule'] = date('h:i A', strtotime($rows['start_time'])). ' to '. date('h:i A', strtotime($rows['end_time']));
            $rows['card_img'] = $rows->image()->count() ? $rows->image->url() : asset('card/default_image.png') ;
            $rows['player_type'] = $rows->playerType->title;
            $rows['play_type'] = $rows->playType->title;
            $rows['schedule_status'] = $rows['register_schedules_count'] < $rows['max_player'] ? 'Available' : 'Full';
        }
        return view('index', [
            'header'=>"Footy Finder",
            "schedule"=>$schedules,
            "searchUrl"=>route('home')
        ]);
   }
   public function detail(Schedule $details){
        // $details = Schedule::findOrFail($id);
        $details['time_schedule'] = date('h:i A', strtotime($details['start_time'])). ' to '. date('h:i A', strtotime($details['end_time']));
        $details['card_img'] = $details->image()->count() ? $details->image->url() : asset('card/default_image.png') ;
        $details['has_uploaded_img'] = $details->image()->count();
        $details['player_type'] = $details->playerType->title;
        $details['play_type'] = $details->playType->title;
        $details['total_registered'] = $details->registerSchedules()->count();
        $details['schedule_status'] = $details['register_schedules_count'] < $details['max_player'] ? 'Available' : 'Full';
        return view('schedule.schedule_detail', [
            'header'=>"Footy Finder",
            "schedule"=>$details
        ]);
   }
   public function create(){
        //temporary default value .. it must be login in order to create new schedule
        $play_type = PlayType::orderBy('title', 'ASC')->get();
        $player_type = PlayerType::orderBy('title', 'ASC')->get();
        $schedule = [
            'contact_person_name' => 'John Wick',
            'contact_number' => '82680427',
            'contact_email' => 'peter.dlideas@gmail.com',
            'button_text'=>'Save',
            'play_type'=>$play_type,
            'player_type'=>$player_type,
            'has_uploaded_img'=>0,
            'form_url'=>route('schedule.store'),
        ];
        return view('schedule.create', ['schedule'=>$schedule, 'page_title'=>'Add Schedule']);
   }
   public function store(StoreSchedule $request){
        $validated = $request->validated();
        $validated['user_id'] = 1;
        
        if($request->hasFile('image')){
            $image = $request->file('image');
            $file_name = $image->storeAs('schedule_images', 'schedule_image_'.md5(now()).'.'.$image->guessClientExtension());
        }
        $schedule = Schedule::create($validated);
        if($schedule && $request->hasFile('image')){
            $schedule->image()->save(Image::make(['file'=>$file_name]));
        }
        return redirect()->route('schedule.detail', ['details'=>$schedule->id]);
   }
   public function edit(Schedule $schedule){
        $play_type = PlayType::orderBy('title', 'ASC')->get();
        $player_type = PlayerType::orderBy('title', 'ASC')->get();
        $schedule['play_type']=$play_type;
        $schedule['player_type']=$player_type;
        $schedule['button_text']='Edit';
        $schedule['form_url']=route('schedule.update', ['schedule'=>$schedule->id]);
        $schedule['has_uploaded_img'] = $schedule->image()->count();
        $schedule['card_img'] = $schedule->image()->count() ? $schedule->image->url() : '';
        return view('schedule.edit', ['schedule' => $schedule, 'page_title'=>'Edit Schedule']);
   }
   public function update(UpdateSchedule $request, Schedule $schedule){
        $validated = $request->validated();
        $schedule->update($validated);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $file_name = $image->storeAs('schedule_images', 'schedule_image_'.md5(now()).'.'.$image->guessClientExtension());
            if($schedule->image()->count()){
                Storage::delete($schedule->image->file);
                $schedule->image->file = $file_name;
                $schedule->image->save();
            }else{
                $schedule->image()->save(Image::make(['file'=>$file_name]));
            }
        }
        return redirect()->route('schedule.detail', ['details'=>$schedule->id]);
   }
   public function delete(Schedule $schedule){
        $schedule->delete();
        return redirect()->route('home');
   }
}
