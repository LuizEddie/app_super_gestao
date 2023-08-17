<?php

namespace App\Http\Controllers;

use App\Item;
use App\Pedido;
use App\PedidoProduto;
use Illuminate\Http\Request;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Pedido $pedido)
    {
        $produtos = Item::all();
        return view("app.pedido_produto.create", ['pedido'=>$pedido, 'titulo' => 'Pedidos', 'produtos'=> $produtos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Pedido $pedido)
    {
        $regras = [
            'produto_id' => 'exists:produtos,id',
            'quantidade' => 'required'
        ];

        $feedback = [
            'required' => 'O campo :attribute deve possuir um valor válido!',
            "produto_id.exists"=> 'O produto informado não existe'
        ];

        $request->validate($regras, $feedback);

        // $pedidoProduto = new PedidoProduto;

        // $pedidoProduto->pedido_id = $pedido->id;
        // $pedidoProduto->produto_id = $request->get("produto_id");
        // $pedidoProduto->quantidade = $request->get('quantidade');

        // $pedidoProduto->save();

        // $pedido->produtos()->attach($request->get("produto_id"), ['quantidade'=> $request->get("quantidade")]);
        $pedido->produtos()->attach([$request->get("produto_id") => ['quantidade' => $request->get("quantidade")]]);

        return redirect()->route('pedido-produto.create', ['pedido'=>$pedido->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
