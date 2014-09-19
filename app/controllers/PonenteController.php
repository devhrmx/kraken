<?php

class PonenteController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$ponentes = Ponente::all();
		return Response::json($ponentes->toArray());
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
		$ponente = new Ponente;
		$data = Request::json();
		if (!($data->has('nombre') &&
			$data->has('procedencia') &&
			$data->has('organizacion') &&
			$data->has('bio') &&
			$data->has('actividad_id'))) {
			return Response::make(null, 400);
		}
		$ponente->nombre = $data->get('nombre');
		$ponente->procedencia = $data->get('procedencia');
		$ponente->organizacion = $data->get('organizacion');
		$ponente->bio = $data->get('bio');
		$ponente->actividad_id = $data->get('actividad_id');
		try {
			$ponente->save();
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
			$ponente = Ponente::findOrFail($id);
		} catch (Exception $e) {
			return Response::make(null, 404);
		}
		return Response::json($ponente->toArray());
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
