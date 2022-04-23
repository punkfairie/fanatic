<?php

/* ------------------------------------------------------------------------- auth_collective ---- */

// returns the currently authenticated collective

use App\Models\Collective;

if (!function_exists('auth_collective')) {
	function auth_collective() : Collective
	{
		return auth()->user();
	}
}