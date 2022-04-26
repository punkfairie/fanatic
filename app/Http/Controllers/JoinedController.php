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
        return view('admin.joined.index');
    }

    public function create()
    {
        return view('admin.joined.create');
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

    public function edit(Joined $joined)
    {
        return view('admin.joined.edit')->with('joined', $joined);
    }

    public function update(UpdateJoinedRequest $request, Joined $joined)
    {
    }

    public function destroy(Joined $joined)
    {
    }
}
