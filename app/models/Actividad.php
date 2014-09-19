<?php

class Actividad extends Eloquent {
	protected $table = 'actividades';
	public $timestamps = false;

	public function ponentes()
	{
		return $this->hasMany('Ponente');
	}

	public function sala()
	{
		return $this->belongsTo('Sala');
	}
}
