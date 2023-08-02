<?php

namespace App\Http\Controllers;

use App\Produto;
use App\Item;
use App\ProdutoDetalhe;
use App\Unidade;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $produtos = Item::with(['itemDetalhe', 'fornecedor'])->paginate(10);
        
        // foreach($produtos as $key => $produto){
        //     // print_r($produto->getAttributes());
        //     // echo '<br><br>';

        //     $produtoDetalhe = ProdutoDetalhe::where('produto_id', $produto->id)->first();
        //     //collection de produtoDetalhe
        //     //ProdutoDetalhe
        //     if(isset($produtoDetalhe)){
        //         // print_r($produtoDetalhe->getAttributes());

        //         $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
        //         $produtos[$key]['largura'] = $produtoDetalhe->largura;
        //         $produtos[$key]['altura'] = $produtoDetalhe->altura ;
        //     }
        //     // echo '<hr>';
        // }

        return view('app.produto.index', ['titulo' => 'Produtos','produtos'=> $produtos, 'request' => $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $unidades = Unidade::all();
        return view('app.produto.create', ['titulo'=>'Produtos', 'unidades' => $unidades]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $regras = [
            "nome" => "required|min:3|max:40",
            "descricao" => "required|min:3|max:2000",
            "peso" => "required|integer",
            "unidade_id" => "exists:unidades,id",
        ];
        $feedbacks = [
            "required" => "Campo :attribute deve ser preenchido",
            "nome.min" => "Deve conter no mínimo 3 caracteres",
            "nome.max" => "Deve conter no máximo 40 caracteres",
            "descricao.min" => "Deve conter no mínimo 3 caracteres",
            "descricao.max" => "Deve conter no máximo 2000 caracteres",
            "peso.integer"=> "O peso deve ser um número inteiro",
            "unidade_id.exists" => "A unidade de medida informada não existe"
        ];

        $request->validate($regras, $feedbacks);

        Item::create($request->all());

        return redirect()->route('produto.index', ['titulo'=>'Produtos']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function show(Item $produto)
    {
        return view('app.produto.show', ['titulo'=>'Produtos', 'produto'=> $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $produto)
    {
        $unidades = Unidade::all();
        return view('app.produto.edit', ['titulo'=>'Produtos', 'produto'=>$produto, 'unidades'=> $unidades]);
        // return view('app.produto.create', ['titulo'=>'Produtos', 'produto'=>$produto, 'unidades'=> $unidades]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $produto)
    {
        $produto->update($request->all());
        return redirect()->route('produto.show', ['titulo'=> 'Produtos', 'produto'=>$produto->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $produto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $produto)
    {
        $produto->delete();

        return redirect()->route('produto.index', ['titulo'=> 'Produtos']);
    }
}
