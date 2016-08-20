@extends('layouts.default')

@section('page_title')
    Home
@stop

@section('styles')

@stop

@section('scripts')

@stop

@section('footer_scripts')

@stop

@section('content')
    <homemap></homemap>

    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h3>Collaborate</h3>
                <article>
                    <strong>PHPMap</strong> allows you to easily find and collaborate with other php developers in your area.
                     Connect and work with others on the next big thing!
                </article>
            </div>

            <div class="col-md-3">
                <h3>Write articles</h3>
                <article>
                    <strong>Developers</strong> <span class="red"><i class="fa fa-heart" aria-hidden="true"></i></span> markdown! Write your articles in markdown and share them with others.
                    You can also export and use them on sites like GitHub and other sites/apps that support .md files.
                </article>
            </div>

            <div class="col-md-3">
                <h3>Connect</h3>
                <article>
                    <strong>Find</strong> other developers in your area and connect with them.
                    Organize meetups, work on projects and make friends.
                    Maybe you will also find your new job!
                </article>
            </div>

            <div class="col-md-3">
                <h3>Learn</h3>
                <article>
                    <strong>Learn</strong> from other developers on PHPMap!
                    As a developer, you will never stop learning.
                    Find developers around you and learn from the best.
                </article>
            </div>
        </div>

        <hr>

        <div class="row">
            <h2 class="text-center">Sponsors</h2>
            <div class="col-md-4">

            </div>

            <div class="col-md-4">

            </div>

            <div class="col-md-4">

            </div>
        </div>
    </div>
@stop