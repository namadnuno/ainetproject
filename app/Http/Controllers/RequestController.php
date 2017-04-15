<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Request as RequestModel;

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
    }

    /**
     * Mostra a página dos pedidos do utilizador
     * @return Illuminate\Http\Request
     */
    public function index(Request $request)
    {
        $requests = auth()->user()->requests();

        $request = $requests->filterBy($request->filter)->orderBy($request->order ? $request->order : 'created_at', 'DESC')->get();

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
    public function store(Request $request)
    {
        dd($request->all());
    }
}
