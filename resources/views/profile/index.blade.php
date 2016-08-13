@extends('layouts.default')

@section('page_title')
    @if($user->name)
        {{ $user->name }}
    @else
        {{ $user->username }}
    @endif
@stop

@section('styles')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.css" rel="stylesheet">
@stop

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.2/summernote.js"></script>
@stop

@section('content')
    <myprofile :user="{{ $user }}" :posts="{{ $user->posts }}"></myprofile>
@stop