<?php

namespace App\Http\Controllers;

use App\Models\Operadora;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class OperadoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Operadora::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $operadora = new Operadora();
        try {
            $operadora->nome =      $request->nome;
            $operadora->descricao = $request->descricao;
            $operadora->status_id =    $request->status_id;

            if ($operadora->save()) {
                return Response('Operadora criada com sucesso!', 201);
            }
        } catch (\Exception $e) {
            return Response($e->getMessage(), 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operadora  $operadora
     * @return \Illuminate\Http\Response
     */
    public function show(Operadora $operadora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operadora  $operadora
     * @return \Illuminate\Http\Response
     */
    public function edit(Operadora $operadora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operadora  $operadora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Operadora $operadora)
    {
        try {
            $operadora->nome =      $request->nome;
            $operadora->descricao = $request->descricao;
            $operadora->status_id =    $request->status_id;

            if ($operadora->save()) {
                return Response("Operadora $request->nome atualizada com sucesso!", 200);
            }
        } catch (\Exception $e) {
            return Response($e->getMessage(), 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operadora  $operadora
     * @return \Illuminate\Http\Response
     */
    public function destroy(Operadora $operadora)
    {
        try {
            $operadora->delete();
            return Response('Operadora deletada com sucesso!', 200);
        } catch (\Exception $e) {
            return Response($e->getMessage(), 400);
        }
    }
}
