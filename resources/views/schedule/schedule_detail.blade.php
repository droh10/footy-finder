@extends('layout')
@section('content')
<x-layout.box>
<div class="row">
    @php
        $img_cnt_class = 'card-img-container';
        if($schedule['has_uploaded_img']){
            $img_cnt_class = '';
        }
    @endphp
    <x-layout.schedule_img_box :class="$img_cnt_class">
        <img src="{{$schedule['card_img']}}" class="card-img-top img-fluid mx-auto d-block card-image-detail" alt="Schedule Image">
    </x-layout.schedule_img_box>
    <div class="col-md-5 col-sm-12">
        <h3>{{$schedule['title']}}</h3>
        <p class="font-italic lead">{{$schedule['description']}}</p>
        <h5><i class="bi bi-person-circle"></i> Contact Person</h5>
        <p class="lead">{{$schedule['contact_person_name']}}</p>
        <h5><i class="bi bi-people-fill"></i></i> Player Type</h5>
        <p class="lead">{{$schedule['player_type']}}</p>
        <h5><i class="bi bi-person-fill-gear"></i> Play Type</h5>
        <p class="lead">{{$schedule['play_type']}}</p>
        <h5><i class="bi bi-gear-fill"></i> Total Players</h5>
        <p class="lead">{{$schedule['max_player']}}</p>
    </div>
    <div class="col-md-3 col-sm-12">
        <div class="d-flex flex-column">
            <x-layout.box class="bg-success text-center total-registered-count mb-3 align-self-center">
                <p class="lead mb-0 text-white">Registered</p>
                <span>{{$schedule['total_registered']}}</span>
            </x-layout.box>
            
            <div class="schedule-status d-flex justify-content-center">
                @if($schedule['schedule_status'] === 'Available')
                    <div class="icon icon-green status-icon-mr icon-green" >
                        <i class="bi bi-check-circle-fill"></i>
                    </div>
                @else 
                    <div class="icon icon-green status-icon-mr icon-red" >
                        <i class="bi bi-x-circle-fill">
                    </div>
                @endif
                <div class="status-name">
                    <p> {{$schedule['schedule_status']}}</p>
                </div>
            </div>
            <div class="reg-button align-self-center mt-4">
                <button type="button" class="btn btn-warning font-weight-bold text-dark px-4 fs-5" data-bs-toggle="modal" data-bs-target="#registerMeModal">
                    Register
                </button>
            </div>
            <div class="schedule-action-container d-flex justify-content-center">
                <div class="edit-schedule status-icon-mr">
                    <a class="text-decoration-none btn btn-info" href="{{route('schedule.edit', ['schedule'=>$schedule['id']])}}"><i class="bi bi-pencil"></i> Edit</a>
                </div>
                <div class="delete-schedule">
                    <form method="POST" action="{{route('schedule.delete', ['schedule'=>$schedule['id']])}}" id="deleteSchedule">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<x-layout.modal_form modalTitle="Confirmation" 
                    modalId="registerMeModal" 
                    formUrl="{{route('schedule.register.player', ['schedule'=>$schedule['id']])}}" 
                    method="POST">
    <p>Are you sure that you want to register to this schedule?</p>
    <h5>Note</h5>
    <p>Once your are approved, the person in charge will contact you </p>
    <p>and the contact information of the incharge will be availableto you.</p>
</x-layout.modal_form>
</x-layout.box>
@endsection