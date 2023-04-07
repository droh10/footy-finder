@extends('layout')
@section('content')
@include('layouts.partials._hero')
<x-form.search-schedule :searchUrl="$searchUrl"/>
@unless(count($schedule) == 0)
    <div class="row">
        @foreach ($schedule as $item)
            <x-schedule_card :schedule="$item" />
        @endforeach
    </div>
    <div class="d-flex justify-content-end mt-5">
        {{$schedule->links()}}
    </div>
@else
    <div class="w-100 text-center mt-3 mb-5">
        <h5>No schedules found.</h5>
    </div>
@endunless
@endsection