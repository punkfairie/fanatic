@extends('admin.layout')

@section('pg-title', 'Log In')

@section('content')

<form action="{{ route('admin.sessions.store') }}" method="POST">
	@csrf

	<fieldset class="form__fieldset">
		<label for="email" class="form__label">Email:</label>
		<input type="email" id="email" name="email" class="form__input">
		@error('email') <p class="form__error">{{ $message }}</p> @enderror

		<label for="password" class="form__label">Password:</label>
		<input type="password" id="password" name="password" class="form__input">
		@error('password') <p class="form__error">{{ $message }}</p> @enderror

		<div class="form__checkbox">
			<input type="checkbox" id="remember" name="remember" value="1"
			       class="form__input--checkbox">
			<label for="remember" class="form__label--checkbox">remember me</label>
			@error('remember') <p class="form__error">{{ $message }}</p> @enderror
		</div>

		<div class="form__btns">
			<input type="submit" class="form__btn" value="Submit">
			<input type="reset" class="input__btn" value="Reset">
		</div>
	</fieldset>
</form>

@endsection