<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreJoinedRequest;
use App\Http\Requests\UpdateJoinedRequest;
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
        Joined::store($request->validated());

        return redirect()->route('admin.joined.index')->with('success', 'Fanlisting added.');
    }

    public function edit(Joined $joined)
    {
        return view('admin.joined.edit')->with('joined', $joined);
    }

    public function update(UpdateJoinedRequest $request, Joined $joined)
    {
        $joined->patch($request->validated());

        return redirect()->route('admin.joined.index')->with('success', 'Fanlisting updated.');
    }

    public function destroy(Joined $joined)
    {
        $joined->remove();

        return redirect()->route('admin.joined.index')->with('success', 'Fanlisting removed.');
    }
}
