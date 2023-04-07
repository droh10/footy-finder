<div class="col-md-3  col-sm-12 d-flex justify-content-center mt-3">
    <div class="card-columns">
        <div class="card-img-container">
            <a href="{{route('schedule.detail', $item['id'])}}">
                <img src="{{$item['card_img']}}" class="card-img-top img-fluid w-100 card-image" alt="Schedule Image">
            </a>
        </div>
        <div class="card-body mt-2">
                <h3 class="card-title">
                    <a href="{{route('schedule.detail', $item['id'])}}">
                        {{$item['title']}}
                    </a>
                </h3>
            <div class="card-text mt-1">
                <p class="lead">{{$item['description']}}</p>
                <p class="mb-0 pb-1"><i class="bi bi-person-circle"></i> {{$item['contact_person_name']}}</p>
                <p class="mb-0 pb-1"><i class="bi bi-calendar-range fs-5"></i> {{$item['date']}}</p>
                <p class="mb-0"><i class="bi bi-alarm fs-5"></i> {{$item['time_schedule']}}</p>
                @php
                    $playCountFlag = $item['register_schedules_count'] > 0 ? " (".$item['register_schedules_count'].")" : "";
                @endphp
                <p class="mb-0"><i class="bi bi-people-fill fs-5"></i> {{$item['max_player'].$playCountFlag}} </p>
                @if($item['schedule_status'] === 'Available')
                    <p class="mb-0"><span class="icon-green"><i class="bi bi-check-circle-fill"></i></span> {{$item['schedule_status']}}</p>
                @else
                    <p class="mb-0"><span class="icon-red"><i class="bi bi-x-circle-fill"></i></span> {{$item['schedule_status']}}</p>
                @endif
            </div>
            <p class="text-muted mt-3 fs-6">
                <i class="bi bi-info-circle fs-5"></i> <em>{{$item['play_type']}}, {{$item['player_type']}}</em>
            </p>
            <a href="{{route('schedule.detail', ["details"=>$item->id])}}" class="btn btn-warning w-100 font-weight-bold">JOIN</a>
        </div>
    </div>
</div>