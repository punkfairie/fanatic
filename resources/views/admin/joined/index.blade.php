@extends('admin.layout')

@section('pg-nav')
	<x-admin.nav :section="'joined'" />
@endsection

@section('pg-title', 'Joined')

@section('content')
@inject('Category', 'App\Models\Category')

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
					<td>
						@if (!$fl->approved)
							<span class="text--error">&times;</span>
						@endif
					</td>
					<td><a href="{{ $fl->url }}" target="_blank">{{ $fl->subject }}</a></td>
					<td>{{ $fl->listCategories() }}</td>
					<td><img src="{{ $fl->image }}"></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ $joined->links() }}
@endsection