@extends('admin.layout')

@section('pg-nav')
	<x-admin.nav :section="'owned'" />
@endsection

@section('pg-title', 'Add Owned')

@section('content')

<form action="{{ route('admin.owned.store') }}" method="POST" autocomplete="off"
      enctype="multipart/form-data">
    @csrf

    <fieldset class="form__fieldset">
        <x-admin.form.categories name="categories[]" required />
        <x-form.text name="subject" :label="'Subject:'" required />
        <x-form.select name="status" :label="'Status:'" :size="1" required />
        <x-form.text name="slug" :label="'Slug:'" required />
        <x-form.text name="title" :label="'Title:'" />
        <x-form.file name="image" />
        <x-form.date name="opened" :label="'Date opened:'" />
        <x-form.checkbox name="hold_member_updates" :label="'Hold member updates?'" />

        <x-form.buttons />
    </fieldset>
</form>

@endsection