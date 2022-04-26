<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJoinedRequest;
use App\Http\Requests\UpdateJoinedRequest;
use App\Models\Category;
use App\Models\Joined;

class JoinedController extends Controller
{
	public function __construct()
	{
		$this->authorizeResource(Joined::class, 'joined');
	}

    public function index()
    {
		$collective = auth_collective();
        return view('admin.joined.index');
    }

    public function create()
    {
        return view('admin.joined.create')->with([
			'categories' => Category::all(),
		]);
    }

    public function store(StoreJoinedRequest $request)
    {
        $validated = $request->safe()->only([
			'categories',
			'url',
			'subject',
			'image',
			'approved',
		]);

		Joined::store($validated);
		return redirect()->route('admin.joined.index')->with('success', 'Fanlisting added.');
    }

    public function approve(Joined $joined)
    {
        $joined->approve();
        return redirect()->route('admin.joined.index')->with('success', 'Fanlisting approved.');
    }

    public function show(Joined $joined)
    {
        //
    }

    public function edit(Joined $joined)
    {
        //
    }

    public function update(UpdateJoinedRequest $request, Joined $joined)
    {
        //
    }

    public function destroy(Joined $joined)
    {
        //
    }
}
