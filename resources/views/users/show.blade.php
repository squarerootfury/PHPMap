@extends('layouts.default')

@section('page_title')
    {{ $user->username }}
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <div class="container">
        <singleuser :user="{{ $user }}" :posts="{{ $user->posts }}" :users="{{ $users }}"></singleuser>
    </div>
@stop