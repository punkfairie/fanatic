@extends('admin.layout')

@section('pg-nav')
	<x-admin.nav :section="'joined'" />
@endsection

@section('pg-title', 'Joined')

@section('content')
	<table class="table">
		<thead class="table__thead">
			<tr>
				<th>{{-- approved --}}</th>
				<th>Subject</th> {{-- link --}}
				<th>Categories</th>
				<th>Image</th>
				<th colspan="3">Actions</th>
			</tr>
		</thead>

		<tbody class="table__tbody">
			@foreach ($joined as $fl)
				<tr>
					<td></td>
					<td><a href="{{ $fl->url }}" target="_blank">{{ $fl->subject }}</a></td>
					<td></td>
					<td><img src="{{ $fl->image }}"></td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ $joined->links() }}
@endsection