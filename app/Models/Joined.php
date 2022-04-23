<?php

namespace App\Models;

use App\Traits\Categorizable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Joined extends Model
{
    use HasFactory, Categorizable;

	protected $table = 'joined';

	protected $casts = [
		'approved' => 'boolean',
	];

/* --------------------------------------------------------------------------- relationships ---- */

	public function collective()
	{
		return $this->belongsTo(Collective::class);
	}

	// injected by trait: categories (morph many-to-many)

/* ---------------------------------------------------------------------------------- joined ---- */

	public static function store($request) : Joined
	{
		$joined = new Joined();
		$joined->url      = $request['url'];
		$joined->subject  = $request['subject'];
		$joined->image    = Storage::putFile('joined', $request['image']);
		$joined->approved = $request['approved'] ?? false;

		$collective = auth_collective();
		$collective->joined()->save($joined);

		$joined->categories()->sync($request['categories']);

		return $joined;
	}
}
