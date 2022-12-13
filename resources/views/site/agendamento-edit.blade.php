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
    <main>
        <div class="create">

            <div class="create-tamanho">
                <div class="create-form">
                    <form action="{{route('agendamento.update',['agendamento' => $agendamento_edit->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <label for="">Nome <input type="text" name="nome" value="{{$agendamento_edit->nome ?? old('nome')}}" placeholder="Digite seu nome">
                            <div class="error" style="color: red;">
                                {{$errors->has('nome') ? $errors->first('nome') : ''}}
                            </div>
                        </label>
                        <label for="">Sobrenome <input type="text" name="sobrenome" value="{{$agendamento_edit->sobrenome ?? old('sobrenome')}}" placeholder="Digite seu sobrenome">
                            <div class="error" style="color: red;">
                                {{$errors->has('sobrenome') ? $errors->first('sobrenome') : ''}}
                            </div>
                        </label>
                        <label for="">E-mail <input type="text" name="email" value="{{$agendamento_edit->email ?? old('email')}}" placeholder="Digite seu email" {{(@$agendamento_edit->type == 'visitante') ? 'disabled' : ''}}>
                            <div class="error" style="color: red;">
                                {{$errors->has('email') ? $errors->first('email') : ''}}
                            </div>
                        </label>
                        <label for="">Senha <input type="text" name="senha" value="{{$agendamento_edit->senha ?? old('senha')}}" placeholder="Digite seu senha">
                            <div class="error" style="color: red;">
                                {{$errors->has('senha') ? $errors->first('senha') : ''}}
                            </div>
                        </label>
                        <div class="create-2label">
                            <label for="">Tipo
                                <select name="type" id="" {{(@$agendamento_edit->type == 'visitante') ? 'disabled' : ''}}>
                                    <option value="adm" {{ @$agendamento_edit->type == 'adm' ? 'selected' : ''}}>ADM</option>
                                    <option value="visitante" {{ @$agendamento_edit->type == 'visitante' ? 'selected' : ''}}>VISITANTE</option>
                                </select>
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
