@extends('layouts.default')

@section('page_title')
    @if($user->name)
        {{ $user->name }}
    @else
        {{ $user->username }}
    @endif
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('content')
    <myprofile :user="{{ $user }}" :posts="{{ $user->posts }}"></myprofile>
@stop