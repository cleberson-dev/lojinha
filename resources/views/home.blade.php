<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Produtos</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-5">
            <a class="navbar-brand" href="#" >Produtos</a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a aria-label="Github" rel="noopener" target="_blank" class="nav-link" href="https://github.com/cleberson-dev">
                        Github
                    </a>
                </li>
                <li aria-label="Twitter" rel="noopener" target="_blank" class="nav-item">
                    <a aria-label="LinkedIn" rel="noopener" target="_blank" class="nav-link" href="https://twitter.com/jrcleb">
                        Twitter
                    </a>
                </li>
                <li class="nav-item">
                    <a aria-label="LinkedIn" rel="noopener" target="_blank" class="nav-link" href="https://linkedin.com/in/clebersondev">
                        LinkedIn
                    </a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <div class="d-flex flex-row justify-content-between align-items-center">
            <h2>Produtos</h2>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adicionarProdutoModal">
                Adicionar novo produto
            </button>   
        </div>
    @if(sizeof($produtos) > 0)
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($produtos as $produto)
                <tr>
                    <th scope="row">{{ $produto->id }}</th>
                    <td>{{ $produto->nome }}</td>
                    <td>{{ $produto->descricao }}</td>
                    <td>{{ $produto->preco }}</td>
                    <td class="d-flex justify-content-end">
                    <button 
                        class="btn btn-primary edit-btn" 
                        data-toggle="modal" 
                        data-target="#editarProdutoModal"
                        data-produto="{{$produto->id}}"
                    >
                        Editar
                    </button>
                    <form action="/{{$produto->id}}" method="POST" >
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger ml-2" type="submit">Excluir</button>
                    </form>    
                    </td>
               
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <p>SEM PRODUTOS!</p>
    @endif

    <div class="modal fade" id="adicionarProdutoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Adicionar produto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="/" method="POST" id="adicionarProdutoForm">
                    @csrf
                    <div class="form-row">
                        <div class="col">
                            <label for="nome">Nome do Produto</label>
                            <input type='text' id='nomeAdd' name='nome' class="form-control" />
                        </div>
                        <div class="col">
                            <label for="preco">Preço</label>
                            <input type='number' step="0.01" id='precoAdd' name='preco' class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea type='text' id='descricaoAdd' name='descricao' class="form-control" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="submit" form="adicionarProdutoForm" class="btn btn-primary">Adicionar</button>
            </div>
          </div>
        </div>
      </div>

      <div class="modal fade" id="editarProdutoModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Editar produto</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
                <form action="/" method="POST" id="editarProdutoForm">
                    @csrf
                    @method('PUT')
                    <div class="form-row">
                        <div class="col">
                            <label for="nome">Nome do Produto</label>
                            <input type='text' id='nomeEditar' name='nome' class="form-control" />
                        </div>
                        <div class="col">
                            <label for="preco">Preço</label>
                            <input type='number' step="0.01" id='precoEditar' name='preco' class="form-control" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Descrição</label>
                        <textarea type='text' id='descricaoEditar' name='descricao' class="form-control" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
              <button type="submit" form="editarProdutoForm" class="btn btn-primary">Editar</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>
        $('.table .edit-btn').on('click', function () {
            // Obter o tr pertence ao produto para editar
            const currentProduct = $(this).parent().parent();
            const id = currentProduct.find('th')[0].innerText;
            const [nome, descricao, preco] = currentProduct.find('td').toArray().map(elm => elm.innerText);

            // Obter o formulário
            const editForm = $('#editarProdutoForm');

            // Alterar a action para redirecionar ao produto correto
            editForm[0].action += id;

            // Obter os campos do formulário de edição
            const [nomeInput, precoInput] = editForm.find('input').toArray().slice(2);
            const [descricaoInput] = editForm.find('textarea').toArray();

            // Preencher o formulário de edição do produto com as informações corretas
            nomeInput.value = nome;
            descricaoInput.value = descricao;
            precoInput.value = preco; 
        });
    </script>
</body>

</html>
