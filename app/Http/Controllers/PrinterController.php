<?php

namespace App\Http\Controllers;

use App\Http\Requests\PrinterPostRequest;
use App\Printer;

class PrinterController extends Controller
{
    /**
     * Página com todas as impressoras
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('printers.index');
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

        $printer->fill($request->all());

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
        $printer->fill($request->all());

        return  redirect()->route('printers.index')->with('success', 'Impressora editada com sucesso');
    }
}
