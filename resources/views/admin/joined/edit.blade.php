@extends('admin.layout')

@section('pg-nav')
    <x-admin.nav :section="'joined'" />
@endsection

@section('pg-title', 'Edit Joined')

@section('content')

<form action="{{ route('admin.joined.update', $joined) }}" method="POST" autocomplete="off">
    @csrf
    @method('PATCH')

    <fieldset class="form__fieldset">
        <x-admin.form.categories :prevCats="$joined->categories" name="categories[]" multiple
                                 required />
        <x-form.url name="url" :current="$joined->url" required />
        <x-form.text name="subject" :label="'Subject:'" :current="$joined->subject" required />
        <x-form.file name="image" :accept="'image'" />
        <x-form.checkbox name="approved" :label="'Approved:'" :current="$joined->approved" />

        <x-form.buttons />
    </fieldset>
</form>

@endsection