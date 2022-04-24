<?php

namespace App\Traits;

use App\Models\Category;

trait Categorizable
{
/* ---------------------------------------------------------------------------- relationship ---- */

	public function categories()
	{
		return $this->morphToMany(Category::class, 'categorizable');
	}

/* -------------------------------------------------------------------------- listCategories ---- */

	public function listCategories() : string
	{
		$cats = $this->categories;
		$str  = '';

		if ($cats->isNotEmpty()) {
			foreach ($cats as $cat) {
				$str .= "$cat->name, ";
			}
		}

		return rtrim($str, ', ');
	}
}
