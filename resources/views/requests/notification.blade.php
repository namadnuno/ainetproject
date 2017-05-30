@extends('layouts.admin')

@section('title', 'Notificações')

@section('content-child')
    <div class=" event-timeline is-bottom-small">
        <form method="get">
            <div class="level">
                <div class="level-left">
                    <div class="level-item">
                        <div class="field">
                            <p class="control">
                            <span class="select is-small">
                              <select name="department">
                                <option value="">Selecione o Departamento</option>
                                  @foreach($departments as $department)
                                      <option value="{{ $department->id }}"
                                              {{ old('department', request('department')) == $department->id ? 'selected' : '' }}>{{ $department  ->name }}</option>
                                  @endforeach
                              </select>
                            </span>
                            </p>
                        </div>
                    </div>
                    <div class="level-item">
                        <button class="button is-primary is-small" type="submit">Filtrar</button>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        @foreach($requests as $request)
            <p class="event-item">
                <span class="icon-item-type"><i class="fa fa-print"></i></span>
                <a href="{{ route('users.show', $request->user) }}">{{ $request->user->name}}</a>
                @if($request->due_date)
                    @if($request->isExpired())
                        fez um <a href="{{ route('requests.show', $request) }}">pedido</a> expirou a
                    @else
                        fez um <a href="{{ route('requests.show', $request) }}">pedido</a> expira daqui a
                    @endif
                    <small class="{{ $request->isExpired() ? 'tag is-danger' : '' }}">{{ carbon($request->due_date)->diffForHumans() }}</small>
                @else
                    fez um <a href="{{ route('requests.show', $request) }}">pedido</a>
                @endif
                @if(!request('department'))
                    , <a href="{{ route('departments.show', $request->user->departament) }}">{{ $request->user->departament->name }}</a>
                @endif
            </p>
        @endforeach
    </div>
    @include('partials.pagination', ['pagination' => $requests])
@stop