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

class AdminRequestController extends Controller
{
    /**
     * Numero de pedidos por página
     */
    const NUM_PER_PAGE = 20;

    public function __constructor()
    {
        $this->middleware('auth');
        $this->authorize('administrate');
    }
    /**
     * Mostra a página dos pedidos do utilizador
     * @return Illuminate\Http\Request
     */
    public function index()
    {
        $requests = RequestModel::search(request('filter'))
        ->orderBy(
            request('orderby') ? request('orderby') : 'created_at',
            request('order') ? request('order') : 'DESC'
        )->paginate(static::NUM_PER_PAGE);

        return view('requests.index', compact('requests'));
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
            'printer_id' => 'required|exists:printers,id'
        ]);

        $request->status = 2;
        $request->printer_id = request('printer_id');
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

    /**
     * Recebe a avaliação do funcionário e guarda no pedido
     * @param  RequestModel $request
     * @return Illuminate\Http\Response
     */
    public function evaluate(RequestModel $request)
    {
        $this->validate(request(),
            ['satisfaction_grade' => 'required|digits_between:1,3']
        );

        $request->satisfaction_grade = request('satisfaction_grade');

        $request->save();

        return redirect()->route('requests.index')
                ->with('success', 'Grau de satisfação foi atribuido ao pedido #'. $request->id .' com sucesso!');
    }
}
