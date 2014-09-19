<?php

class Ponente extends Eloquent {
	protected $table = 'ponentes';
	public $timestamps = false;

	public function actividad()
	{
		return $this->belongsTo('Actividad');
	}
}
