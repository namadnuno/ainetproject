@extends('layouts.admin')

@section('content-child')
    <div class="box">
        <div class="media-content">
            <form action="{{ route('requests.store') }}" method="POST">
                {{ csrf_field() }}
                {{--

                Descrição do pedido;
                Data do pedido;
                Data limite para conclusão do pedido (opcional);
                Número de cópias;
                Cores/Preto e branco;
                Com/sem agrafo
                Tamanho do papel (A3, A4);
                Tipo de papel (rascunho, normal, fotográfico);
                Conteúdo multimédia (ficheiro a imprimir), podendo ser: ◦ Imagem (JPG, TIFF, PNG…); ◦ Ficheiro Word; ◦ Ficheiro Excel; ◦ Ficheiro ODT; ◦ Ficheiro PDF.

                --}}
                <div class="field">
                    <label class="description">Descrição do pedido</label>
                    <p class="control">
                        <textarea class="textarea" placeholder="Descrição" name="description"></textarea>
                    </p>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label for="open_date">Data do Pedido</label>
                            <p class="control">
                                <input type="date" class="input" name="open_date"
                                       value="{{ old('open_date') ? old('open_date') : \Carbon\Carbon::now()->toDateString() }}">
                            </p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="open_date">Data de Conclusão (opcional)</label>
                            <p class="control">
                                <input type="date" class="input" name="due_date"
                                       value="{{ old('open_date') ? old('open_date') : '' }}">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label for="quantity">Número de copias</label>
                            <input type="number" class="input" min="1" max="1000" name="quantity">
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="colored">Cores/Preto e branco</label>
                            <p class="control">
                                <span class="select is-fullwidth">
                                    <select name="colored" id="colored" class="select">
                                        <option value="1">Cores</option>
                                        <option value="0">Preto e branco</option>
                                    </select>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="stapled">Com/sem agrafo</label>
                            <p class="control">
                                <span class="select is-fullwidth">
                                    <select name="stapled" id="stapled" class="select">
                                        <option value="1">Com</option>
                                        <option value="0">Sem</option>
                                    </select>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label for="paper_size">Tamanho do papel</label>
                            <p class="control">
                                <span class="select is-fullwidth">
                                    <select name="paper_size" id="paper_size" class="select">
                                        <option value="6">A6</option>
                                        <option value="5">A5</option>
                                        <option value="4" selected>A4</option>
                                        <option value="3">A3</option>
                                        <option value="2">A2</option>
                                        <option value="1">A1</option>
                                    </select>
                                </span>
                            </p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="paper_type">Tipo de papel</label>
                            <p class="control">
                                <span class="select is-fullwidth">
                                    <select name="paper_type" id="paper_type" class="select">
                                        <option value="1">normal</option>
                                        <option value="2">rascunho</option>
                                        <option value="3">fotográfico</option>
                                    </select>
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column is-half">
                        <div class="field">
                            <label for="open_date">Ficheiro</label>
                            <p class="control">
                                <input type="file" class="input" name="file">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="has-text-right">
                    <button class=" button is-primary">Enviar</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('title')
    Novo Pedido
@endsection