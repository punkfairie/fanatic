<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionsController extends Controller
{
    public function create()
	{
		return view('admin.sessions.create');
	}

	public function store()
	{
		$credentials = request()->validate([
			'email'    => ['required', 'exists:collectives,email'],
			'password' => ['required']
		]);

		$remember = request()->boolean('remember');

		if (!Auth::attempt($credentials, $remember)) {
			return back()->withInput()->withErrors([
				'email'    => 'Your email could not be verified.',
				'password' => 'Your password is incorrect.',
			]);
		}

		return redirect()->route('admin.dashboard')->with('success', 'Welcome back!');
	}

	public function destroy(Request $request)
	{
		auth()->logout();
		$request->session()->invalidate();
		$request->session()->regenerateToken();
		return redirect()->route('admin.sessions.create')->with('success', 'Goodbye!');
	}
}
