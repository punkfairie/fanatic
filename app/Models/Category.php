<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
/* --------------------------------------------------------------------------- relationships ---- */

	public function parent()
	{
		return $this->belongsTo(__CLASS__, 'parent_id');
	}

	public function joined()
	{
		return $this->morphedByMany(Joined::class, 'categorizable');
	}
}
