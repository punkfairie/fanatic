<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Collective extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

/* -------------------------------------------------------------------------------- password ---- */

	protected function password() : Attribute
	{
		return Attribute::make(
			set: fn ($value) => bcrypt($value),
		);
	}

/* ----------------------------------------------------------------------------------- store ---- */

	public static function store(array $validated) : Collective
	{
		$collective = new Collective();
		$collective->title    = $validated['title'];
		$collective->name     = $validated['name'];
		$collective->email    = $validated['email'];
		$collective->password = $validated['password'];
		$collective->save();

		return $collective;
	}
}
