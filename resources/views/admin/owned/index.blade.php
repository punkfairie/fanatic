@extends('admin.layout')

@section('pg-nav')
	<x-admin.nav :section="'owned'" />
@endsection

@section('pg-title', 'Owned')

@section('content')
    <livewire:admin.list-fanlistings :class="'owned'" />
@endsection