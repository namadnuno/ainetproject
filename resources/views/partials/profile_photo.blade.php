@if (auth()->user()->profile_photo)
	<img src="{{ asset('storage/profiles/' . auth()->user()->profile_photo) }}" class="is-circle">
@else
	<img src="http://bulma.io/images/placeholders/128x128.png" class="is-circle">
@endif