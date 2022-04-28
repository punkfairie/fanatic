<?php

define('PER_PAGE', 7);

define('DATE_FMT', 'j F Y');
define('FORM_DATE_FMT', 'Y-m-d');
define('DATE_FMT_SHORT', 'j M y');

/* ------------------------------------------------------------------------- auth_collective ---- */

// returns the currently authenticated collective

use App\Models\Collective;

if (!function_exists('auth_collective')) {
    function auth_collective() : Collective
    {
        return auth()->user();
    }
}
