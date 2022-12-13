<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href=" {{ asset('site/css/index.css') }}">
    <link rel="stylesheet" href=" {{ asset('site/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('site/bootstrap/css/bootstrap.css') }}">

    <title>home</title>

</head>

<body>

    <div class="box-home">
        <div class="box-home-tamanho">

            <div class="home-navbar">
                <div class="home-h1">
                    <h1>PetCab</h1>
                </div>
                <div class="home-nav">
                    <nav class="nav nav-pills">
                        <a class="nav-link active" id="home" data-bs-toggle="pill" data-bs-target="#v-pills-home" type="button" role="tab" href="{{Route('home')}}"> <img src="{{asset('/site/img/home.png')}}" alt=""> <span>Home</span> </a>
                        <a class="nav-link" id="user" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" href="{{Route('agendamento.index')}}" onclick="tabela()"><img src="{{asset('/site/img/user.png')}}" alt=""> <span>Usuários</span></a>
                    </nav>
                </div>
            </div>

            <div class="home-2">
                    <div class="home-2-h1">
                        <h1>Bem-Vindo!</h1>
                    </div>
                    <div class="home-2-img">
                        <img src="{{asset('/site/img/homeEntrada.png')}}" alt="">
                    </div>
                    <div class="heme-2-cadastros">
                        <span>Distribua as demandas entre seus usuários!</span>
                        <a href="{{route('agendamento.create')}}"><img src="{{asset('/site/img/adicionar.png')}}" alt=""> Cadastrar Novo usuário</a>
                    </div>
            </div>

        </div>
    </div>

</body>

</html>
