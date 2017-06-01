<?php

namespace App\Http\Controllers;

use App\Http\Requests\PedidoPutRequest;
use App\Http\Requests\PedidoRequest;
use App\Printer;
use App\Request as RequestModel;
use Barryvdh\DomPDF\Facade as PDF;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Mockery\Exception;
use Ramsey\Uuid\Uuid;

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

        if (request('due_date')) {
            $pedido->due_date = carbon(request('due_date'))->toDateString();
        }

        $pedido->status = 1;

        $pedido->owner_id = auth()->user()->id;

        $filename = Uuid::uuid1()->toString() . '.' . $request->file->extension();

        $request->file->storeAs('/print-jobs/' . $pedido->owner_id, $filename);
        
        $pedido->file = $filename;

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
        $this->authorize('show', $request);
        return view(
            'requests.show',
            compact('request')
        );
    }

    public function edit(RequestModel $request)
    {
        $this->authorize('update', $request);
        return view('requests.edit', compact('request'));
    }

    /**
     * Atualiza o pedido de impressão
     * @param PedidoRequest $requestValidator
     * @param RequestModel $request
     */
    public function update(PedidoPutRequest $requestValidator, RequestModel $request)
    {
        $this->authorize('update', $request);

        $request->fill($requestValidator->all());

        if (request('due_date')) {
            $request->due_date = carbon(request('due_date'))->toDateString();
        }

        if ($requestValidator->hasFile('file')) {
            $filename = Uuid::uuid1()->toString() . '.' . $requestValidator->file->extension();
            $requestValidator->file->storeAs('/print-jobs/' . $request->owner_id, $filename);
            $request->file = $filename;
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
        $this->authorize('delete', $request);

        if ($request->status == 2) {
            return back()->with('warning', 'Não é possível remover pedidos concluidos!');
        }

        $request->delete();
        
        return back()->with('success', 'Pedido removido com sucesso');
    }

    /**
     * Recebe a avaliação do funcionário e guarda no pedido
     * @param  RequestModel $request
     * @return Illuminate\Http\Response
     */
    public function evaluate(RequestModel $request)
    {
        $this->authorize('evaluate', $request);

        $this->validate(request(),
            ['satisfaction_grade' => 'required|digits_between:1,3']
        );

        $request->satisfaction_grade = request('satisfaction_grade');

        $request->save();

        return redirect()->route('requests.index')
                ->with('success', 'Grau de satisfação foi atribuido ao pedido #'. $request->id .' com sucesso!');
    }

    /**
     * Dado um pedido faz um relatório retorna o download dele
     * @param  Request $request
     * @return [type]
     */
    public function report(RequestModel $request)
    {
        $this->authorize('show', $request);

        $pdf = PDF::loadView('requests.report', compact('request'));
        return $pdf->download('invoice.pdf');
    }
}
