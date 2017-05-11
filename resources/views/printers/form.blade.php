{{ csrf_field() }}

<div class="field">
    <label class="label">Nome</label>
    <p class="control">
        <input class="input" type="text" placeholder="Nome" name="name"
               value="{{ old('name', $user->name)}}">
    </p>
</div>