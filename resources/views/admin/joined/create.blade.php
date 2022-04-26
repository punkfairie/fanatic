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
		<x-admin.form.categories name="categories[]" multiple required />
		<x-form.url name="url" required />
        <x-form.text name="subject" :label="'Subject:'" required />
        <x-form.file name="image" :accept="'image'" />
        <x-form.checkbox name="approved" :label="'Approved:'" />

        <x-form.buttons />
	</fieldset>
</form>

@endsection