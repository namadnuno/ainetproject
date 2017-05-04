@extends('layouts.admin')

@section('content-child')
    <div class="box">
        <div class="media-content">
            <form action="{{ route('requests.store') }}" method="POST" enctype="multipart/form-data">
                @include('partials.errors')
                {{ csrf_field() }}
                <div class="field">
                    <label class="description">Descrição do pedido</label>
                    <p class="control">
                        <textarea class="textarea" placeholder="Descrição" name="description">{{ old('description') }}</textarea>
                    </p>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label for="open_date">Data do Pedido</label>
                            <p class="control">
                                <input type="date" class="input" name="open_date"
                                       value="{{ old('open_date' , \Carbon\Carbon::now()->toDateString())  }}">
                            </p>
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="open_date">Data de Conclusão (opcional)</label>
                            <p class="control">
                                <input type="date" class="input" name="due_date"
                                       value="{{ old('open_date') }}">
                            </p>
                        </div>
                    </div>
                </div>
                <div class="columns">
                    <div class="column">
                        <div class="field">
                            <label for="quantity">Número de copias</label>
                            <input type="number" class="input" min="1" max="1000" name="quantity" value="{{ old('quantity', 1) }}">
                        </div>
                    </div>
                    <div class="column">
                        <div class="field">
                            <label for="colored">Cores/Preto e branco</label>
                            <p class="control">
                                <span class="select is-fullwidth">
                                    <select name="colored" id="colored" class="select">
                                        <option value="1" {{ old('colored') == "1" ? 'selected' : '' }}>Cores</option>
                                        <option value="0" {{ old('colored') == "0" ? 'selected' : '' }}>Preto e branco</option>
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
                                        <option value="1" {{ old('stapled') == "1" ? 'selected' : '' }}>Com</option>
                                        <option value="0" {{ old('stapled') == "1" ? 'selected' : '' }}>Sem</option>
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
                                        <option value="6" {{ old('paper_size') == "6" ? 'selected' : '' }}>A6</option>
                                        <option value="5" {{ old('paper_size') == "5" ? 'selected' : '' }}>A5</option>
                                        <option value="4" {{ old('paper_size') == "4" ? 'selected' : 'selected' }}>A4</option>
                                        <option value="3" {{ old('paper_size') == "3" ? 'selected' : '' }}>A3</option>
                                        <option value="2" {{ old('paper_size') == "2" ? 'selected' : '' }}>A2</option>
                                        <option value="1" {{ old('paper_size') == "1" ? 'selected' : '' }}>A1</option>
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