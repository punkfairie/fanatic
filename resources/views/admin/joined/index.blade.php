@extends('admin.layout')

@section('pg-nav')
	<x-admin.nav :section="'joined'" />
@endsection

@section('pg-title', 'Joined')

@section('content')
    <livewire:admin.list-fanlistings :class="'joined'" />
@endsection