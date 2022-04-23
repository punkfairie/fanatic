<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCollectiveRequest;
use App\Http\Requests\UpdateCollectiveRequest;
use App\Models\Collective;

class CollectiveController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function create()
    {
        return view('admin.install');
    }

    public function store(StoreCollectiveRequest $request)
    {
        $validated = $request->safe()->only([
			'title',
			'name',
			'email',
			'password',
		]);

		$collective = Collective::store($validated);
		auth()->login($collective);
		return redirect()->route('dashboard')->with('success', 'Fanatic installed!');
    }

    public function show(Collective $collective)
    {
        //
    }

    public function edit(Collective $collective)
    {
        //
    }

    public function update(UpdateCollectiveRequest $request, Collective $collective)
    {
        //
    }

    public function destroy(Collective $collective)
    {
        //
    }
}
