@extends('admin.layout')

@section('pg-nav')
	<x-admin.nav :section="'joined'" />
@endsection

@section('pg-title', 'Add Joined')

@section('content')

<form action="{{ route('admin.joined.store') }}" method="POST" enctype="multipart/form-data"
      autocomplete="off">
	@csrf

	<fieldset class="form__fieldset">
		<label for="categories" class="form__label">Categories:</label>
		<x-admin.form.categories :categories="$categories" name="categories[]" id="categories"
		                         multiple required />
		@error('categories') <p class="form__error">{{ $message }}</p> @enderror

		<label for="url" class="form__label">URL:</label>
		<input type="url" id="url" name="url" value="{{ old('url') }}" class="form__input" required>
		@error('url') <p class="form__error">{{ $message }}</p> @enderror

		<label for="subject" class="form__label">Subject:</label>
		<input type="text" id="subject" name="subject" value="{{ old('subject') }}"
		       class="form__input" required>
		@error('subject') <p class="form__error">{{ $message }}</p> @enderror

		<label for="image" class="form__label">Image:</label>
		<input type="file" id="image" name="image" value="{{ old('image') }}" accept="image/*"
		       class="form__input--file">
		@error('image') <p class="form__error">{{ $message }}</p> @enderror

		<div class="form__checkbox">
			<input type="checkbox" id="approved" name="approved" value="1"
			       class="form__input--checkbox" @checked(old('approved'))>
			<label for="approved" class="form__label--checkbox">Approved</label>
		</div>

		<div class="form__btns">
			<input type="submit" class="form__btn" value="Submit">
			<input type="reset"  class="form__btn" value="Reset">
		</div>
	</fieldset>
</form>

@endsection