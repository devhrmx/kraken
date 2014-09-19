<?php

class Sala extends Eloquent {
	protected $table = 'salas';
	public $timestamps = false;

	public function actividades()
	{
		return $this->hasMany('Actividad');
	}
}
