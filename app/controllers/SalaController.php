<?php

class SalaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$salas = Sala::all();
		return Response::json($salas->toArray());
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
		$sala = new Sala;
		$data = Request::json();
		if (!($data->has('nombre') &&
			$data->has('aforo'))) {
			return Response::make(null, 400);
		}
		$sala->nombre = $data->get('nombre');
		$sala->aforo = $data->get('aforo');
		try {
			$sala->save();
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
			$sala = Sala::findOrFail($id);
		} catch (Exception $e) {
			return Response::make(null, 404);
		}
		return Response::json($sala->toArray());
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
