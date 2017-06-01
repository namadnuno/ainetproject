@extends('layouts.main')

@section('content')
    @include('partials.section-header',
    [
        'title' => 'Depatamento '. $department->name,
        'subtitle' => ''
    ])
    <div class="container is-top-medium is-bottom-medium" id="content">
        <div class="columns">
            <div class="column is-6">
                <department-requests-types :department="{{ $department }}"></department-requests-types>
            </div>
            <div class="column">
                <div class="card">
                    <div class="card-header">
                        <p class="card-header-title">
                            Dados
                        </p>
                    </div>
                    <div class="card-content">
                        <table class="table-bordered">
                            <tbody>
                                <tr>
                                    <td>
                                        Nome:
                                    </td>
                                    <td>
                                        {{ $department->name }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Numero de Funcionários:
                                    </td>
                                    <td>
                                        {{ $department->users()->count() }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Numero de Pedidos Concluidos:
                                    </td>
                                    <td>
                                        {{ $department->requests()->done()->count() }} / {{ $department->requests()->count() }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Numero de Pedidos Cores:
                                    </td>
                                    <td>
                                        {{ $department->requests()->colored()->done()->count() }} / {{ $department->requests()->colored()->count() }}
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        Numero de Pedidos Preto e Branco:
                                    </td>
                                    <td>
                                        {{ $department->requests()->blackAndWhite()->done()->count() }} / {{ $department->requests()->blackAndWhite()->count() }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <p class="card-header-title">
                    Funcionários
                </p>
            </div>
            <div class="card-content">
                <div class="columns is-multiline">
                @foreach ($department->users()->get() as $user)
                        <div class="column is-3">
                        <div class="columns">
                            <div class="column is-3 is-marginless">
                                <div class="image">
                                    @include('partials.profile_photo_of', $user)
                                </div>
                            </div>
                            <div class="column is-9">
                                <p>
                                    <a href="{{ route('users.show', $user) }}" class="is-link">
                                        <strong>{{ $user->name }}</strong>
                                    </a>
                                    <span class="subtitle is-6 is-small">{{ $user->email }}</span>
                                </p>
                            </div>
                        </div>
                        </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        var _api = "{{ url('/') }}";
    </script>
    <script src="{{ asset('js/home.js') }}"></script>
@endsection
