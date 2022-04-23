@extends('admin.layout')

@section('content')
	<h1><span>Welcome to Fanatic!</span></h1>
	<p>This is the installation page. You will only need to complete this once, but values can be
		changed after installation.</p>

	<form action="{{ route('collectives.store') }}" method="POST">
		@csrf

		<fieldset class="form__fieldset">
			<label class="form__label" for="title">Collective title:</label>
			<input class="form__input" type="text" name="title" id="title" required
			       value="{{ old('title') }}">
			@error('title') <p class="form__error">{{ $message }}</p> @enderror

			<label class="form__label" for="name">Your name:</label>
			<input class="form__input" type="text" id="name" name="name" required
			       value="{{ old('name') }}">
			@error('name') <p class="form__error">{{ $message }}</p> @enderror

			<label class="form__label" for="email">Your email:</label>
			<input class="form__input" type="email" id="email" name="email" required
			       value="{{ old('email') }}">
			@error('email') <p class="form__error">{{ $message }}</p> @enderror

			<label class="form__label" for="password">Your password:</label>
			<input class="form__input" type="password" id="password" name="password" required>
			@error('password') <p class="form__error">{{ $message }}</p> @enderror

			<label class="form__label" for="password_confirmation">Confirm password:</label>
			<input class="form__input" type="password" id="password_confirmation"
			       name="password_confirmation" required>
			@error('password_confirmation') <p class="form__error">{{ $message }}</p> @enderror

			<div class="form__btns">
				<input class="form__btn" type="submit" value="Submit">
				<input class="form__btn" type="reset" value="Reset">
			</div>
		</fieldset>
	</form>
@endsection