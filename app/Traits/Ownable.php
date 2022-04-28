<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

trait Ownable
{
    public function collective() : BelongsTo
    {
        return $this->belongsTo(Collective::class);
    }
}
