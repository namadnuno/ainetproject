@if (auth()->user()->profile_photo)
	<img src="{{ asset('storage/profiles/' . auth()->user()->profile_photo) }}" class="is-circle">
@else
	<img src="{{ asset('profile_photo/no_photo.jpg') }}" class="is-circle">
@endif