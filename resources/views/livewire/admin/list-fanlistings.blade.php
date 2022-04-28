<div>
    <input type="text" name="search" placeholder="Search fanlistings..." class="form__input--search"
           wire:model="searchTerm" />
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
			@foreach ($fanlistings as $fl)
				<tr>
					<td>
						@if (!$fl->approved)
							<span class="text--error">&times;</span>
						@endif
					</td>
					<td><a href="{{ $fl->url }}" target="_blank">{{ $fl->subject }}</a></td>
					<td>{{ $fl->listCategories() }}</td>
					<td><img src="{{ $fl->image }}"></td>

					<td>
                        @if ($class == 'joined' && $fl->approved == false)
                            <button wire:click="approve({{ $fl }})" class="btn--table">
                                Approve
                            </button>
                        @elseif ($class == 'owned')
                            <a href="{{ route('admin.owned.show', $fl) }}" class="btn--table">View</a>
                        @endif
                    </td>

					<td>
                        <a href="{{ route("admin.$class.edit", $fl) }}" class="btn--table">Edit</a>
                    </td>

					<td>
                        <x-admin.form.destroy :object="$fl" :route="'admin.'.$class.'.destroy'"
                                              :btnClass="'btn--table'"/>
                    </td>
				</tr>
			@endforeach
		</tbody>
	</table>

	{{ $fanlistings->links() }}
</div>
