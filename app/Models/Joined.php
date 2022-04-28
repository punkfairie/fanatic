<?php

namespace App\Models;

use App\Traits\Categorizable;
use App\Traits\Imageable;
use App\Traits\Ownable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Joined extends Model
{
    use HasFactory;
    use Ownable;
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

    // injected by trait: collective (belongsTo)

    // injected by trait: categories (morph many-to-many)

    /* ------------------------------------------------------------------------------ joined ---- */

    public static function store(array $validated) : Joined
    {
        $validated['image']    = $validated['image'] ?? null;

        $joined           = new static();
        $joined->url      = $validated['url'];
        $joined->subject  = $validated['subject'];
        $joined->image    = self::imagePath($validated['image']);
        $joined->approved = $validated['approved'] ?? false;

        auth_collective()->joined()->save($joined);
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

    /* ------------------------------------------------------------------------------ remove ---- */

    public function remove() : void
    {
        $this->categories()->detach();
        $this->delete();
    }
}
