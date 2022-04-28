<?php

namespace App\Models;

use App\Traits\Categorizable;
use App\Traits\Imageable;
use App\Traits\Ownable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owned extends Model
{
    use HasFactory;
    use Ownable;
    use Categorizable;
    use Imageable;

    protected $table = 'owned';

    protected $casts = [
        'opened'              => 'datetime',
        'hold_member_updates' => 'boolean',
    ];

    /* ----------------------------------------------------------------------- relationships ---- */

    // injected by trait: collective (belongsTo)

    // injected by trait: categories (many-to-many polymorphic)

    /* --------------------------------------------------------------------------------- url ---- */

    protected function url() : Attribute
    {
        return Attribute::make(
            get: fn () => "/{$this->slug}",
        );
    }

    /* ------------------------------------------------------------------------------- store ---- */

    public static function store(array $validated) : static
    {
        $validated['image']    = $validated['image'] ?? null;

        $owned                      = new static();
        $owned->subject             = $validated['subject'];
        $owned->status              = $validated['status'];
        $owned->slug                = $validated['slug'];
        $owned->title               = $validated['title'] ?? null;
        $owned->image               = self::imagePath($validated['image']);
        $owned->opened              = $validated['opened']                   ?? null;
        $owned->hold_member_updates = $validated['hold_member_updates']      ?? false;

        auth_collective()->owned()->save($owned);
        $owned->categories()->sync($validated['categories']);

        return $owned;
    }
}
