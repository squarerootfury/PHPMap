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
        <div class="alert alert-success" role="alert">
            <h4 class="text-center">PHPMap is still in development. Feel free to contribute on <a href="https://github.com/PHPMap/PHPMap">GitHub</a>.</h4>
        </div>

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
        
        <h2 class="text-center">Live from the community</h2>
        <latest-posts></latest-posts>
        
        <hr>

        <div class="row">
            <h2 class="text-center">Stats</h2>

            <div class="col-md-4">
                <h3 class="text-center">{{ App\User::count() }} Users worldwide</h3>
            </div>

            <div class="col-md-4">
                <h3 class="text-center">{{ App\Models\UserPost::count() }} Statuses updated</h3>
            </div>

            <div class="col-md-4">
                <h3 class="text-center">{{ App\Models\BlogEntry::count() }} Articles written</h3>
            </div>

            {{--<div class="col-md-4">--}}
                {{--<h3>{{ App\Models\Meetup::count() }} Meetups organized</h3>--}}
            {{--</div>--}}
        </div>

        <hr>

    </div>
@stop