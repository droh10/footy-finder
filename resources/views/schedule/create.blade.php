@extends('layout')
@section('content')
    <h3>{{$page_title}}</h3>
    <x-layout.box class="mb-5">
        <x-form.create-schedule :schedule="$schedule"/>
    </x-layout.box>
@endsection