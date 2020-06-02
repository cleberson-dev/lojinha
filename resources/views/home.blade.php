<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Produtos</title>
</head>

<body>
    @if(sizeof($produtos) > 0)
        <ul>
            <h1>Produtos</h1>
            @foreach($produtos as $produto)
                <li>
                    <p>{{ $produto->id }}</p>
                    <p>{{ $produto->nome }}</p>
                    <p>{{ $produto->descricao }}</p>
                    <p>{{ $produto->preco }}</p>

                    <form action="/{{ $produto->id }}" method="POST">
                        <h2>Editar</h2>
                        @csrf
                        @method('PUT')

                        <input type='text' id='nome' name='nome' value="{{ $produto->nome }}" />
                        <input type='text' id='descricao' name='descricao' value="{{ $produto->descricao }}" />
                        <input type='number' id='preco' name='preco' value="{{ $produto->preco }}" />
                        <button type="submit">Editar</button>

                        @method('DELETE')
                        <button type="submit" class="deleteBtn">X</button>
                    </form>
                </li>
            @endforeach
        </ul>
    @else
        <p>SEM PRODUTOS!</p>
    @endif
    <form action="/" method="POST">
        <h2>Criar</h2>
        @csrf

        <input type='text' id='nome' name='nome' />
        <input type='text' id='descricao' name='descricao' />
        <input type='number' id='preco' name='preco' />
        <button type="submit">Criar</button>
    </form>
</body>

</html>
