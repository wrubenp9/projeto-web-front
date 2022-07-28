<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href=" {{ asset('site/css/agendamento-create.css') }}">
    <link rel="stylesheet" href=" {{ asset('site/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('site/bootstrap/css/bootstrap.css') }}">

    <title>Agendamento</title>

</head>

<body>
    <header>
        <div class="header">
            <div class="header-tamanho">
                <div class="header-logo">
                    <div class="header-logo-img">
                        <img src="{{ asset('site/img/logo.jfif') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="create">
            <div class="create-tamanho">
                <div class="create-form">
                    <form action="{{route('agendamento.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label for="">Nome: <input type="text" name="nome" value="{{old('nome')}}" placeholder="Digite seu nome">
                            <div class="error" style="color: red;">
                                {{$errors->has('nome') ? $errors->first('nome') : ''}}
                            </div>
                        </label>
                        <label for="">Telefone: <input type="text" name="telefone" value="{{old('telefone')}}" placeholder="Digite seu telefone">
                            <div class="error" style="color: red;">
                                {{$errors->has('telefone') ? $errors->first('telefone') : ''}}
                            </div>
                        </label>
                        <div class="create-2label">
                            <label for="">Favorito:
                                <select name="favorito" id="" value="{{old('favorito')}}">
                                    <option value="sim">SIM</option>
                                    <option value="nao">NÃO</option>
                                </select>
                            </label>
                            <label for="">Data e Hora: <input type="datetime-local" name="data" value="{{old('data')}}" id="">
                                <div class="error" style="color: red;">
                                    {{$errors->has('data') ? $errors->first('data') : ''}}
                                </div>
                            </label>
                        </div>
                        <div class="create-button">
                            <a href="{{route('agendamento.index')}}">Voltar</a>
                            <input type="submit" value="Cadastrar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html>
