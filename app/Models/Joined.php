<?php

namespace App\Models;

use App\Traits\Categorizable;
use App\Traits\Imageable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joined extends Model
{
    use HasFactory;
    use Categorizable;
    use Imageable;

    protected $table = 'joined';

    protected $fillable = [
        'url',
        'subject',
        'approved',
        'image',
    ];

    protected $casts = [
        'approved' => 'boolean',
    ];

    /* ----------------------------------------------------------------------- relationships ---- */

    public function collective()
    {
        return $this->belongsTo(Collective::class);
    }

    // injected by trait: categories (morph many-to-many)

    /* -------------------------------------------------------------------------- attributes ---- */

    protected function approved() : Attribute
    {
        return Attribute::make(
            set: fn ($value) => isset($value) ? $value = $value : $value = false,
        );
    }

    /* ------------------------------------------------------------------------------ joined ---- */

    public static function store(array $validated) : Joined
    {
        $validated['image']    = $validated['image'] ?? null;
        $validated['image']    = self::imagePath($validated['image']);
        $validated['approved'] = $validated['approved'] ?? false;

        $joined = auth_collective()->joined()->create($validated);
        $joined->categories()->sync($validated['categories']);

        return $joined;
    }

    /* ------------------------------------------------------------------------------- patch ---- */

    public function patch(array $validated) : Joined
    {
        $validated['image'] = $validated['image'] ?? null;

        $this->url      = $validated['url'];
        $this->subject  = $validated['subject'];
        $this->image    = $this->updateImage($validated['image']);
        $this->approved = $validated['approved'] ?? false;

        if ($this->isDirty()) {
            $this->save();
        }

        if (isset($validated['categories'])) {
            $this->categories()->sync($validated['categories']);
        }

        return $this;
    }
}
