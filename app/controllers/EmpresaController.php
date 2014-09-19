<?php

class EmpresaController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$empresas = Empresa::all();
		return Response::json($empresas->toArray());
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
		$empresa = new Empresa;
		$data = Request::json();
		if (!($data->has('nombre') &&
			$data->has('patrocinio') &&
			$data->has('brief'))) {
			return Response::make(null, 400);
		}
		$empresa->nombre = $data->get('nombre');
		$empresa->patrocinio = $data->get('patrocinio');
		$empresa->brief = $data->get('brief');
		$empresa->url = $data->get('url');
		try {
			$empresa->save();
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
			$empresa = Empresa::findOrFail($id);
		} catch (Exception $e) {
			return Response::make(null, 404);
		}
		return Response::json($empresa->toArray());
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
