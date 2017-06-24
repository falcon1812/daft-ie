<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Flats extends Eloquent
{
	protected $collection = 'flats';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'url',
	];

}
