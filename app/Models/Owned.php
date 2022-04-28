<?php

namespace App\Models;

use App\Traits\Categorizable;
use App\Traits\Imageable;
use App\Traits\Ownable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Owned extends Model
{
    use HasFactory;
    use Ownable;
    use Categorizable;
    use Imageable;

    protected $table = 'owned';

    /* ----------------------------------------------------------------------- relationships ---- */
}
