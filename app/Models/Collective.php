<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Collective extends Authenticatable
{
    use HasApiTokens;
    use Notifiable;

    /* @var array<int, string> */

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /* @var array<int, string> */

    protected $hidden = [
        'password',
        'remember_token',
    ];

    /* @var array<string, string> */

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* ----------------------------------------------------------------------- relationships ---- */

    public function joined() : HasMany
    {
        return $this->hasMany(Joined::class);
    }

    public function owned() : HasMany
    {
        return $this->hasMany(Owned::class);
    }

    /* ---------------------------------------------------------------------------- password ---- */

    protected function password() : Attribute
    {
        return Attribute::make(
            set: fn ($value) => bcrypt($value),
        );
    }

    /* ------------------------------------------------------------------------------- store ---- */

    public static function store(array $validated) : Collective
    {
        $collective           = new Collective();
        $collective->title    = $validated['title'];
        $collective->name     = $validated['name'];
        $collective->email    = $validated['email'];
        $collective->password = $validated['password'];
        $collective->save();

        return $collective;
    }
}
