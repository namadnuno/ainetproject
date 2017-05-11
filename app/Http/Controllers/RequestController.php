<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoRequest;
use App\Request as RequestModel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class RequestController extends Controller
{
    /**
     * Numero de pedidos por página
     */
    private const NUM_PER_PAGE = 20;

    public function __constructor()
    {
        $this->middleware('web');
    }
    /**
     * Mostra a página dos pedidos do utilizador
     * @return Illuminate\Http\Request
     */
    public function index()
    {
        //dd(request()->all());
        $requests = auth()->user()->requests();
        $requests = $requests
        ->ofType(request('filter'))
        ->orderBy(
            request('orderby') ? request('orderby') : 'created_at',
            request('order') ? request('order') : 'DESC'
        )->paginate(static::NUM_PER_PAGE);

        return view('requests.index', compact('requests'));
    }

    /**
     * Página de criação de um Request
     * @return Illuminate\Http\Request
     */
    public function create()
    {
        $request= new Request;
        return view('requests.new', compact('request'));
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
        $pedido->file = $filename;
        $request->file->move(public_path('files'), $filename);

        $img = Image::make(public_path('files/' . $filename));
        $img->fit(256);
        $img->save(public_path('file-thumb/' . $filename));

        $pedido->owner_id = auth()->user()->id;
        $pedido->save();

        return redirect()->route(
            'requests.index'
        )->with('success', 'Pedido criado com sucesso!');
    }

    /**
     * Apresenta a página do pedido 
     * com a informação do mesmo
     * @param  int id
     * @return Illuminate\Http\Request
     */
    public function show(RequestModel $request)
    {
        return view(
            'requests.show',
            compact('request')
        );
    }

    public function edit(RequestModel $request)
    {
        return view('requests.edit', compact('request'));
    }

    public function update(PedidoRequest $requestVal, RequestModel $request)
    {
        # code...
    }

    public function refuse(RequestModel $request)
    {
        $request->status = 0;
        $request->save();

        return redirect()->route('requests.index')
                ->with('success', 'Pedido #'. $request->id .' recusado com sucesso!');
    }

    public function conclude(RequestModel $request)
    {
        $request->status = 2;
        $request->save();

        return redirect()->route('requests.index')
                ->with('success', 'Pedido #'. $request->id .' concluído com sucesso!');
    }

    public function readmit(RequestModel $request)
    {
        $request->status = 1;
        $request->save();

        return redirect()->route('requests.index')
                ->with('success', 'Pedido #'. $request->id .' readmitido com sucesso!');
    }
}
