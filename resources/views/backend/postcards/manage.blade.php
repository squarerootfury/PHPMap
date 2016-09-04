@extends('layouts.default')

@section('page_title')
    Manage Postcards
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('footer_scripts')

@stop

@section('content')
    <div class="container">
        @if(!$postcards)
            <ul>
                @foreach($postcards as $postcard)
                    <li>{{ $postcard->id }}</li>
                @endforeach
            </ul>
        @else
            <h4 class="text-center">There are currently no postcards. <a href="{{ route('postcards.create') }}">Create one</a></h4>
        @endif
    </div>
@stop