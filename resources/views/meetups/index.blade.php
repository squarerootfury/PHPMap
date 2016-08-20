@extends('layouts.default')

@section('page_title')
    Meetups
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('footer_scripts')

@stop

@section('content')
    <div class="container">
        <ul>
            @foreach($meetups as $meetup)
                <li>{{ $meetup->title }}</li>
            @endforeach
        </ul>
    </div>
@stop