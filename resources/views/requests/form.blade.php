@include('partials.errors')
{{ csrf_field() }}
<div class="field">
    <label class="description">Descrição do pedido</label>
    <p class="control">
        <textarea class="textarea" placeholder="Descrição" name="description">{{ old('description', $request->description) }}</textarea>
    </p>
</div>
<div class="columns">
    <div class="column">
        <div class="field">
            <label for="due_date">Data de Finalização</label>
            <p class="control">
                <input type="date" class="input" name="due_date"
                       value="{{ old('due_date', $request->due_date ? carbon($request->due_date)->format('Y-m-d') : '') }}">
            <p class="help">Data prevista para entrega (opcional)</p>
            </p>
        </div>
    </div>
    <div class="column">
        <label for="front_back">Frente e verso</label>
        <p class="control">
                <span class="select is-fullwidth">
                    <select name="front_back" id="front_back" class="select">
                        <option value="0" {{ old('front_back', $request->front_back) == "0" ? 'selected' : '' }}>Não</option>
                        <option value="1" {{ old('front_back', $request->front_back) == "1" ? 'selected' : '' }}>Sim</option>
                    </select>
                </span>
        </p>
    </div>
</div>
<div class="columns">
    <div class="column">
        <div class="field">
            <label for="quantity">Número de cópias</label>
            <input type="number" class="input" min="1" max="1000" name="quantity" value="{{ old('quantity', $request->quantity) }}">
        </div>
    </div>
    <div class="column">
        <div class="field">
            <label for="colored">Cores/Preto e branco</label>
            <p class="control">
                <span class="select is-fullwidth">
                    <select name="colored" id="colored" class="select">
                        <option value="1" {{ old('colored', $request->colored) == "1" ? 'selected' : '' }}>Cores</option>
                        <option value="0" {{ old('colored', $request->colored) == "0" ? 'selected' : '' }}>Preto e branco</option>
                    </select>
                </span>
            </p>
        </div>
    </div>
    <div class="column">
        <div class="field">
            <label for="stapled">Com/Sem agrafo</label>
            <p class="control">
                <span class="select is-fullwidth">
                    <select name="stapled" id="stapled" class="select">
                        <option value="1" {{ old('stapled', $request->stapled) == "1" ? 'selected' : '' }}>Com</option>
                        <option value="0" {{ old('stapled', $request->stapled) == "1" ? 'selected' : '' }}>Sem</option>
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
                        <option value="6" {{ old('paper_size', $request->paper_size) == "6" ? 'selected' : '' }}>A6</option>
                        <option value="5" {{ old('paper_size', $request->paper_size) == "5" ? 'selected' : '' }}>A5</option>
                        <option value="4" {{ old('paper_size', $request->paper_size) == "4" ? 'selected' : 'selected' }}>A4</option>
                        <option value="3" {{ old('paper_size', $request->paper_size) == "3" ? 'selected' : '' }}>A3</option>
                        <option value="2" {{ old('paper_size', $request->paper_size) == "2" ? 'selected' : '' }}>A2</option>
                        <option value="1" {{ old('paper_size', $request->paper_size) == "1" ? 'selected' : '' }}>A1</option>
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
                        <option value="1" {{ old('paper_type', $request->paper_type) == "1" ? 'selected' : '' }}>Normal</option>
                        <option value="2" {{ old('paper_type', $request->paper_type) == "2" ? 'selected' : '' }}>Rascunho</option>
                        <option value="3" {{ old('paper_type', $request->paper_type) == "3" ? 'selected' : '' }}>Fotográfico</option>
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
                <input type="file" class="input" name="file" value="{{ old('file', $request->file) }}">
            </p>
        </div>
    </div>
</div>
<div class="has-text-right">
    <button type="submit" class="button is-primary">Enviar</button>
</div>

