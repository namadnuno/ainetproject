<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as RequestModel;
use App\Http\Requests\PedidoRequest;

class RequestController extends Controller
{

    /**
     * Repositório
     * @var  Request $repo
     */
    private $repo;

    /**
     * Contrutor do RequestController
     * @param Request $repo
     */
    public function __constructor(RequestModel $repo)
    {
        $this->repo = $repo;
        $this->middleware('web ');
    }

    /**
     * Mostra a página dos pedidos do utilizador
     * @return Illuminate\Http\Request
     */
    public function index(Request $request)
    {
        $requests = auth()->user()->requests()->get();

        //$request = $requests->FilterBy($request->filter)->orderBy($request->order ? $request->order : 'created_at', 'DESC')->get();

        return view('requests.index', compact('requests'));
    }

    /**
     * Página de criação de um Request
     * @return Illuminate\Http\Request
     */
    public function new()
    {
        return view('requests.new');
    }

    /**
     * Recebe o request com os dados do pedido
     * Cria o pedido
     * @param Request $request
     */
    public function store(PedidoRequest $request)
    {
        $pedido = new RequestModel();
        $pedido = $pedido->fill($request->all());
        $pedido->status = 1;
        $filename = 'file-' . time() . '.' . $request->file->extension();
        $pedido->file = 'files/'.$filename;
        $request->file->move(public_path('files'), $filename);
        $pedido->owner_id = auth()->user()->id;
        $pedido->save();

        return redirect()->route('requests.index'
            )->with('success' , 'Pedido criado com sucesso!');
    }
}
