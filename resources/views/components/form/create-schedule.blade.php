<form action="{{$schedule['form_url']}}" method="POST" id="create-form" enctype="multipart/form-data">
@csrf
<div class="row">
    <div class="form-group col-md-6 col-sm-12">
        <label for="contact_person" class="mb-2">Contact Person</label>
        <input type="text" value="{{$schedule['contact_person_name'] ?? old('contact_person_name')}}" class="form-control" id="contact_person_name" name="contact_person_name" placeholder="Contact Person">
        @error('contact_person_name')
            <p class="text-danger form-error-txt">{{$message}}</p>    
        @enderror
    </div>
    <div class="form-group col-md-3 col-sm-12">
        <label for="contact_person"  class="mb-2">Contact Number</label>
        <input type="number" value="{{$schedule['contact_number'] ?? old('contact_number')}}" class="form-control" id="contact_number" name="contact_number" placeholder="Contact Number">
        @error('contact_number')
            <p class="text-danger form-error-txt">{{$message}}</p>    
        @enderror
    </div>
    <div class="form-group col-md-3 col-sm-12">
        <label for="contact_email" class="mb-2">Contact Email </label>
        <input type="email"  value="{{$schedule['contact_email'] ?? old('contact_email')}}" class="form-control" id="contact_email" name="contact_email" placeholder="Contact Email">
        @error('contact_email')
            <p class="text-danger form-error-txt">{{$message}}</p>    
        @enderror
    </div>
</div>
{{-- details --}}
<div class="row mt-5">
    <div class="col-md-6 col-sm-12">
        <div class="mb-2">
            <label for="title" class="mb-2">Title</i></label>
            <input type="text" value="{{$schedule->title ?? old('title')}}" class="form-control" id="title" name="title" placeholder="Title">
            @error('title')
                <p class="text-danger form-error-txt">{{$message}}</p>    
            @enderror
        </div>
        <div class="mb-2">
            <label for="description" class="mb-2">Description</label>
            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Description">{{$schedule->description ?? old('description')}}</textarea>
            @error('description')
                <p class="text-danger form-error-txt">{{$message}}</p>    
            @enderror
        </div>
        <div class="mb-2">
            <label for="max_player" class="mb-2">Total Players</i></label>
            <input type="number" min=1 value="{{$schedule->max_player ?? old('max_player')}}" class="form-control" id="max_player" name="max_player" maxlength="3" placeholder="Total Players">
            @error('title')
                <p class="text-danger form-error-txt">{{$message}}</p>    
            @enderror
        </div>
        <div class="mb-2">
            <label for="play_type" class="mb-2">Play Type</label>
            <select class="form-control" id="play_type_id" name="play_type_id">
                <option value=0 selected>Choose Play Type</option>
                @foreach ($schedule['play_type'] as $type)
                    @php 
                        $flag = '';
                        if((isset($schedule['play_type_id']) && !empty($schedule['play_type_id']) && $type['id'] == $schedule['play_type_id']) || old('play_type_id') == $type['id'] ){
                            $flag = 'selected';
                        }
                    @endphp
                    <option value="{{$type['id']}}" {{$flag}}>{{$type['title']}}</option>
                @endforeach
            </select>
            @error('play_type_id')
                <p class="text-danger form-error-txt">{{$message}}</p>    
            @enderror
        </div>
        <div class="mb-2">
            <label for="player_type" class="mb-2">Player Type</label>
            <select class="form-control" id="player_type_id" name="player_type_id">
                <option  value=0 selected>Choose Player Type</option>
                @foreach ($schedule['player_type'] as $type)
                    @php 
                        $flag = '';
                        if((isset($schedule['player_type_id']) && !empty($schedule['player_type_id']) && $type['id'] == $schedule['player_type_id']) || old('player_type_id') == $type['id']){
                            $flag = 'selected';
                        }
                    @endphp
                    <option value="{{$type['id']}}" {{$flag}}>{{$type['title']}}</option>
                @endforeach
            </select>
            @error('player_type_id')
                <p class="text-danger form-error-txt">{{$message}}</p>    
            @enderror
        </div>
    </div>
    <div class="col-md-6 col-sm-12">
        <div class="mb-2">
            <label for="venue" class="mb-2">Venue</i></label>
            <input type="text" value="{{$schedule->venue ?? old('venue')}}" class="form-control" id="venue" name="venue" placeholder="Venue">
            @error('venue')
                <p class="text-danger form-error-txt">{{$message}}</p>    
            @enderror
        </div>
        <div class="mb-2 d-flex justify-content-between">
            <div class="date-container">
                <label for="schedule_date" class="mb-2">Date</i></label>
                <input type="text" value="{{$schedule->date ?? old('date')}}" class="form-control" id="schedule_date" name="date" placeholder="Date">
                @error('date')
                    <p class="text-danger form-error-txt">{{$message}}</p>    
                @enderror
            </div>
            <div class="start-time-container">
                <label for="start_time" class="mb-2">Start Time</i></label>
                <input type="text" value="{{$schedule->start_time ?? old('start_time')}}" class="form-control" id="start_time" name="start_time" placeholder="Start Time">
                @error('start_time')
                    <p class="text-danger form-error-txt">{{$message}}</p>    
                @enderror
            </div>
            <div class="end-time-container">
                <label for="end_time" class="mb-2">End Time</i></label>
                <input type="text" value="{{$schedule->end_time ?? old('end_time')}}" class="form-control" id="end_time" name="end_time" placeholder="End Time">
                @error('end_time')
                    <p class="text-danger form-error-txt">{{$message}}</p>    
                @enderror
            </div>
        </div>
        <div class="mb-2">
            <label for="image">Image</label>
            <div class="mt-2">
                <input type="file" class="form-control-file border" id="image" name="image">
            </div>
            @if($schedule['has_uploaded_img'])
                <div class="mt-2 schedule-img-preview">
                    <img src="{{$schedule['card_img']}}" class="img-fluid" />
                </div> 
            @endif
            @error('image')
                <p class="text-danger form-error-txt">
                    {{$message}}
                </p>    
            @enderror
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <button type="submit" class="btn btn-success">{{$schedule['button_text']}}</button>
    </div>
</div>


{{-- google maps --}}
{{-- upload image     --}}
</form>
<script> 
    window.addEventListener('load', function() {
        initDateInput(document.getElementById('schedule_date'));
        initTimeInput(document.getElementById('start_time'));
        initTimeInput(document.getElementById('end_time'));
    });
</script>