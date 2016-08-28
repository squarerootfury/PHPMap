@extends('layouts.default')

@section('page_title')
    Account Settings
@stop

@section('styles')

@stop

@section('scripts')
	<script>
		var placesAutocomplete = places({
			container: document.querySelector('#address-input'),
		});

		placesAutocomplete.on('change', e => this.updateLatLng(e));
		var updateLatLng = function(e) {
			$('<input>').attr({
				type: 'hidden',
				id: 'lat',
				name: 'lat',
				value: e.suggestion['latlng']['lat']
			}).appendTo('form');

			$('<input>').attr({
				type: 'hidden',
				id: 'lng',
				name: 'lng',
				value: e.suggestion['latlng']['lng']
			}).appendTo('form');

			$('<input>').attr({
				type: 'hidden',
				id: 'city',
				name: 'city',
				value: e.suggestion['name']
			}).appendTo('form');

			$('<input>').attr({
				type: 'hidden',
				id: 'country',
				name: 'country',
				value: e.suggestion['country']
			}).appendTo('form');
		}
	</script>
@stop

@section('content')
	<div class="container">
		<div>
			<ul class="nav nav-tabs" role="tablist">
				<li role="presentation" class="active"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></li>
				<li role="presentation"><a href="#avatar" aria-controls="avatar" role="tab" data-toggle="tab">Avatar</a></li>
				<li role="presentation"><a href="#password" aria-controls="password" role="tab" data-toggle="tab">Password</a></li>
				<li role="presentation"><a href="#location" aria-controls="location" role="tab" data-toggle="tab">Location</a></li>
				{{--<li role="presentation"><a href="#oauth" aria-controls="oauth" role="tab" data-toggle="tab">OAuth</a></li>--}}
			</ul>

			<div class="tab-content">
				<div role="tabpanel" class="tab-pane active" id="profile">
					<br>

					<profilesettings :user="{{ auth()->user() }}"></profilesettings>
				</div>

				<div role="tabpanel" class="tab-pane" id="avatar">
					<br>

					<div class="row">
						<div class="col-md-3">
							<img src="{{ auth()->user()->avatar }}" alt="{{ auth()->user()->username }}" class="img img-responsive img-thumbnail">
						</div>

						<div class="col-md-3"></div>

						<div class="col-md-6">
							<form class="form" role="form" action="{{ url('/updateAvatar') }}" method="post" enctype="multipart/form-data">
								{!! csrf_field() !!}
								<div class="form-group">
									<label for="avatar">Upload new Avatar</label>
									<input type="file" id="avatar" name="avatar">
									<p class="help-block">Please use an image that is on square-size. (PNG, JPG).</p>
								</div>
								<br><br>
								<button class="btn btn-primary">Save Avatar</button>
							</form>
						</div>
					</div>
				</div>

				<div role="tabpanel" class="tab-pane" id="password">
					<br>
					<accountsettings :user="{{ auth()->user() }}"></accountsettings>
				</div>

				<div role="tabpanel" class="tab-pane" id="location">
					<br>

					<form class="form" role="form" action="{{ url('/updateLocation') }}" method="post">
						{!! csrf_field() !!}
						<input type="search" name="address" class="form-control" id="address-input" value="{{ auth()->user()->address }}"/>
						<input type="hidden" name="lat" value="">
						<input type="hidden" name="lng" value="">

						<br><br>
						<button class="btn btn-primary">Save Location</button>
					</form>
				</div>

				<div role="tabpanel" class="tab-pane" id="oauth">
					<br>
					<passport-clients></passport-clients>
					<passport-authorized-clients></passport-authorized-clients>
					<passport-personal-access-tokens></passport-personal-access-tokens>
				</div>
			</div>
		</div>
	</div>
@stop