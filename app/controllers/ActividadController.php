<?php

class ActividadController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$actividades = Actividad::all();
		return Response::json($actividades->toArray());
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		if (!Request::isJson()) {
			return Response::make(null, 400);
		}
		$actividad = new Actividad;
		$data = Request::json();
		if (!($data->has('titulo') &&
			$data->has('tipo') &&
			$data->has('descripcion') &&
			$data->has('publico_objetivo') &&
			$data->has('requerimientos') &&
			$data->has('fecha') &&
			$data->has('sala_id'))) {
			return Response::make(null, 400);
		}
		$actividad->titulo = $data->get('titulo');
		$actividad->tipo = $data->get('tipo');
		$actividad->descripcion = $data->get('descripcion');
		$actividad->publico_objetivo = $data->get('publico_objetivo');
		$actividad->requerimientos = $data->get('requerimientos');
		$actividad->fecha = $data->get('fecha');
		$actividad->sala_id = $data->get('sala_id');
		try {
			$actividad->save();
		} catch (Exception $e) {
			return Response::make(null, 400);
		}
		return Response::make(null, 201);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
		try {
			$actividad = Actividad::findOrFail($id);
		} catch (Exception $e) {
			return Response::make(null, 404);
		}
		return Response::json($actividad->toArray());
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
