<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Produtos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>
