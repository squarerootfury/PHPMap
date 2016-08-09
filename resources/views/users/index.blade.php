@extends('layouts.default')

@section('page_title')
    Users
@stop

@section('styles')
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.css">
@stop

@section('footer_scripts')
    <script src="https://cdn.jsdelivr.net/instantsearch.js/1/instantsearch.min.js"></script>
@stop

@section('content')
    <div class="container">
        <users></users>
    </div>
@stop