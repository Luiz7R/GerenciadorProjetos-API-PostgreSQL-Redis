<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</head>
<body>
    <div class="container">
        <div>
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Ativo</th>
                    <th scope="col">Entrega</th>
                    <th scope="">Usuario</th>
                  </tr>
                </thead>
                @foreach ($projetos as $item)
                    <tbody>
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->nome }}</td>
                        <td>{{ $item->descricao }}</td>
                        <td>{{ $item->ativo }}</td>
                        <td>{{ $item->data_entrega }}</td>
                        <td>{{ $item->id_usuario }}</td>
                    </tr>
                    </tbody>
                @endforeach
            </table>
        </div>
    </div>
</body>
</html>