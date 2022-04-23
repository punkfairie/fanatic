@extends('admin.layout')

@section('content')
	<h1><span>Welcome to Fanatic!</span></h1>
	<p>This is the installation page. You will only need to complete this once, but values can be
		changed after installation.</p>

	<form action="{{-- route('collective.store') --}}" method="POST">
		@csrf

		<fieldset class="form__fieldset">
			<label class="form__label" for="title">Collective title:</label>
			<input class="form__input" type="text" name="title" id="title"
			       value="{{ old('title') }}">

			<label class="form__label" for="name">Your name:</label>
			<input class="form__input" type="text" id="name" name="name"
			       value="{{ old('name') }}">

			<label class="form__label" for="email">Your email:</label>
			<input class="form__input" type="email" id="email" name="email"
			       value="{{ old('email') }}">

			<label class="form__label" for="password">Your password:</label>
			<input class="form__input" type="password" id="password" name="password"
			       value="{{ old('password') }}">

			<div class="form__btns">
				<input class="form__btn" type="submit" value="Submit">
				<input class="form__btn" type="reset" value="Reset">
			</div>
		</fieldset>
	</form>
@endsection