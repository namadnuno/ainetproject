<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoPutRequest;
use App\Http\Requests\PedidoRequest;
use App\Printer;
use App\Request as RequestModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Mockery\Exception;

class RequestController extends Controller
{
    /**
     * Numero de pedidos por página
     */
    const NUM_PER_PAGE = 20;

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
        $requests = auth()->user()->requests()->search(request('filter'))
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
        
        $pedido->file = $request->file->store('public/files');

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

    /**
     * Atualiza o pedido de impressão
     * @param PedidoRequest $requestValidator
     * @param RequestModel $request
     */
    public function update(PedidoPutRequest $requestValidator, RequestModel $request)
    {
        $request->fill($requestValidator->all());
        
        //dd('add');
        //dd($requestValidator->file->store('public/files'));

        if ($requestValidator->hasFile('file')) {
            $request->file = $requestValidator->file->store('public/files');
        }

        $request->save();

        return redirect()->route(
            'requests.index'
        )->with('success', 'Pedido editado com sucesso!');
    }

    /**
     * Remove um pedido que não esteja concluido
     * @param  Request $request
     * @return Illuminate\Http\Response
     */
    public function destroy(RequestModel $request)
    {
        if ($request->status == 2) {
            return back()->with('warning', 'Não é possível remover pedidos concluidos!');
        }

        $request->delete();
        
        return back()->with('success', 'Pedido removido com sucesso');
    }

    /**
     * Mostra a view com onde é dito o porque de ser recusado
     * @param RequestModel $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function refuse(RequestModel $request)
    {
        return view('requests.refuse', compact('request'));
    }

    /**
     * Recusa o pedido de impressão
     * @param RequestModel $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function refused(RequestModel $request)
    {
        $this->validate(request(), [
            'refused_reason' => 'required|min:10'
        ]);

        $request->status = 0;

        $request->refused_reason = request('refused_reason');

        $request->save();

        return redirect()->route('requests.index')
                ->with('success', 'Pedido #'. $request->id .' recusado com sucesso!');
    }

    /**
     * Mostra a view para ser escolhida a impressora que finalizou o pedido
     * @param RequestModel $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function finish(RequestModel $request)
    {
        $printers = Printer::all();
        return view('requests.finish', compact('request', 'printers'));
    }

    /**
     * Finaliza o pedido de impressão
     * @param RequestModel $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function done(RequestModel $request)
    {
        $this->validate(request(), [
            'printer_id' => 'required|exists:printers,id',
            'satisfaction_grade' => 'required|digits_between:1,3'
        ]);

        $request->status = 2;

        $request->printer_id = request('printer_id');

        $request->satisfaction_grade = request('satisfaction_grade');

        $request->closed_date = Carbon::now();

        $request->save();

        return redirect()->route('requests.index')->with('success', 'Pedido finalizado com sucesso!');
    }
    /**
     * Readmite o pedido de impressão
     * @param RequestModel $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function readmit(RequestModel $request)
    {
        $request->status = 1;
        $request->save();

        return redirect()->route('requests.index')
                ->with('success', 'Pedido #'. $request->id .' readmitido com sucesso!');
    }
}
