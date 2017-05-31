<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrinterPostRequest;
use App\Printer;

class PrinterController extends Controller
{
    const NUM_PER_PAGE=20;
    /**
     * Página com todas as impressoras
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $printers = Printer::search(request('filter'))
        ->orderBy(
            request('orderby') ? request('orderby') : 'created_at',
            request('order') ? request('order') : 'DESC'
        )->paginate(static::NUM_PER_PAGE);
        return view('printers.index', compact('printers'));
    }

    /**
     * Mostra a página de para criar Impressora
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $printer = new Printer;
        return view('printers.create', compact('printer'));
    }

    /**
     * Mostra a página para editar impressora
     * @param Printer $printer
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Printer $printer)
    {
        return view('printers.edit', compact('printer'));
    }

    /**
     * Cria uma nova impressora
     * @param PrinterPostRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PrinterPostRequest $request)
    {
        $printer = new Printer;

        $printer->create($request->all());

        return redirect()->route('printers.index')->with('success', 'Impressora criada com sucesso');
    }

    /**
     * Atualiza uma impressora
     * @param PrinterPostRequest $request
     * @param Printer $printer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PrinterPostRequest $request, Printer $printer)
    {
        $printer->update($request->all());

        return  redirect()->route('printers.index')->with('success', 'Impressora editada com sucesso');
    }

    /**
     * Remove uma dada impressora
     * @param Printer $printer
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Printer $printer)
    {
        if ($printer->requests()->count() > 0) {
            return back()->with('error', 'Impossível remover impressora pois tem pedidos associados!');
        }

        return back()->with('success', 'Impressora removida com sucesso!');
    }
}
