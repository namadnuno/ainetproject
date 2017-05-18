{{ csrf_field() }}
<div class="field">
	<label class="label">Nome</label>
	<p class="control">
		<input class="input" type="text" placeholder="Nome" name="name"
		value="{{ old('name', $user->name)}}">
	</p>
</div>
<div class="field">
	<label class="label">Email</label>
	<p class="control">
		<input class="input" type="text" placeholder="Email" name="email"
		value="{{ old('email', $user->email) }}">
	</p>
</div>
<div class="field">
	<label class="label">Password</label>
	<p class="control">
		<input class="input" type="password" placeholder="Password" name="password">
	</p>
</div>
<div class="field">
	<label class="label">Password</label>
	<p class="control">
		<input class="input" type="password" placeholder="Confirmação da Password" name="password_confirmation">
	</p>
</div>
<div class="field">
	<label class="label">Departamento</label>
	<p class="control">
		<span class="select is-fullwidth">
			<select name="department_id" >
				<option value="">-- Selecione o departamento --</option>
				@foreach (\App\Departament::all() as $departamento)
				<option {{ old('department_id', $user->department_id) == $departamento->id ? 'selected' : '' }} value="{{ $departamento->id }}">{{ $departamento->name }}</option>
				@endforeach
			</select>
		</span>
	</p>
</div>
<div class="field">
	<label class="label">Telemovel</label>
	<p class="control">
		<input class="input" type="number" min="100000000" max="999999999" placeholder="Telemovel" name="phone"
		value="{{ old('phone', $user->phone) }}">
	</p>
</div>
<div class="field">
	<label class="label">Perfil (Ligação)</label>
	<p class="control">
		<input class="input" type="text" placeholder="ex: twitter/..." name="profile_url"
		value="{{ old('profile_url', $user->profile_url) }}">
	</p>
</div>
<div class="field">
	<label class="label">Apresentação</label>
	<p class="control">
		<textarea class="textarea" name="presentation" placeholder="Apresentação">{{ old('presentation', $user->presentation) }}</textarea>
	</p>
</div>
<div class="field">
	<label class="label">Fotografia</label>
	<p class="control">
		<input class="input" type="file" name="profile_photo">
	</p>
</div>