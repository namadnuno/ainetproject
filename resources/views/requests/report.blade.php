<!DOCTYPE html>
<html>
<head>
    <title>Relatório do pedido #{{ $request->id }}</title>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        .container {
            max-width: 875px;
        }
        .alert-failed {
            color: #ff7653;
        }
        .alert-success {
            color: #94ff9e;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="title">
        Relatório do pedido #{{ $request->id }}
    </h1>
    <hr>
    <table>
        <tbody>
        <tr>
            <td>Descrição do pedido:</td>
            <td>{{ $request->description }}</td>
        </tr>
        <tr>
            <td>Data do pedido:</td>
            <td>{{ $request->created_at }}</td>
        </tr>
        <tr>
            <td>Data limite para conclusão do pedido (opcional):</td>
            <td>
                @if(!$request->due_date )
                    ---
                @else
                    @if(carbon($request->due_date)->lt(carbon($request->closed_date)))
                        <span class="alert-failed">A data da entrega era a {{ $request->due_date }} e foi apenas concluido a {{ $request->closed_date }}</span>
                    @else
                        <span class="alert-success">A data da entrega era a {{ $request->due_date }} e foi concluido a {{ $request->closed_date }}</span>
                    @endif
                @endif
            </td>
        </tr>
        <tr>
            <td>Número de cópias:</td>
            <td>{{ $request->quantity }}</td>
        </tr>
        <tr>
            <td>Cores/Preto e branco:</td>
            <td>{{ $request->colored }}</td>
        </tr>
        <tr>
            <td>Com/sem agrafo</td>
            <td>{{ $request->straped }}</td>
        </tr>
        <tr>
            <td>Tamanho do papel (A3, A4):</td>
            <td>A{{ $request->paper_size }}</td>
        </tr>
        <tr>
            <td>Tipo de papel (rascunho, normal, fotográfico):</td>
            <td>
                @if($request->paper_type == 1)
                    Normal
                @elseif ($request->paper_size == 2)
                    Rascunho
                @else
                    Fotográfico
                @endif
            </td>
        </tr>
        </tbody>
    </table>
    <ul>

    </ul>
</div>
</body>
</html>