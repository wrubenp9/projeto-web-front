<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href=" {{ asset('site/css/index.css') }}">
    <link rel="stylesheet" href=" {{ asset('site/css/agendamento.css') }}">
    <link rel="stylesheet" href=" {{ asset('site/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('site/bootstrap/css/bootstrap.css') }}">

    <title>Usuário</title>

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
                        <a class="nav-link" id="home" href="{{Route('home')}}"> <img src="{{asset('/site/img/home.png')}}" alt=""> <span>Home</span> </a>
                        <a class="nav-link active" id="user" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" href="{{Route('agendamento.index')}}" onclick="tabela()"><img src="{{asset('/site/img/user.png')}}" alt=""> <span>Usuários</span></a>
                    </nav>
                </div>
            </div>

            <div class="home-2">

                    <div class="box">
                        <div class="main-table-create">
                            <label for=""><a href="{{Route('agendamento.create')}}">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="30" height="30" viewBox="0 0 24 24" stroke-width="2.9" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg>
                                    Novo usuário</a>
                            </label>
                        </div>
                        <div class="box-tamanho">

                            <div class="table">
                                <table class="table table-hover" style="margin:20px;">

                                    <thead>
                                        <tr>
                                            <th scope="col">NOME</th>
                                            <th scope="col">SOBRENOME</th>
                                            <th scope="col">EMAIL</th>
                                            <th scope="col">TIPO</th>
                                            <th scope="col">AÇOES</th>
                                        </tr>
                                    </thead>
                                    <tbody>



                                        @foreach ($agendamento_index as $kay => $item)
                                        <tr>
                                            <td>{{ $item->nome }}</td>
                                            <td>{{ $item->sobrenome }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->type }}</td>
                                            <td>
                                                <a href="{{route('agendamento.edit',['agendamento' => $item->id])}}"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                                        <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                                        <line x1="16" y1="5" x2="19" y2="8" />
                                                    </svg>
                                                </a>

                                                <button onclick="deletar('{{$item->id}}')">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="25" height="25" viewBox="0 0 24 24" stroke-width="2" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                                        <line x1="4" y1="7" x2="20" y2="7" />
                                                        <line x1="10" y1="11" x2="10" y2="17" />
                                                        <line x1="14" y1="11" x2="14" y2="17" />
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                                    </svg>
                                                </button>
                                            </td>

                                        </tr>

                                        {{-- inicio modal  --}}
                                        <div class="modal-tradicional" id="abrirmodal{{$item->id}}">
                                            <div class="abrimodal">
                                                <div class="abrimodal-h1">
                                                    <h1>DELETAR AGENDAMENTO</h1>
                                                    <p onclick="fechar1({{$item->id}})">X</p>
                                                </div>

                                                <div class="abrimodal-texto">
                                                    <p>Deseja mesmo apagar esse Agendamento ? DE: {{$item->nome}}</p>
                                                </div>
                                                <div class="abrimodal-button">
                                                    <input type="submit" onclick="fechar2('{{ $item->id }}')" class="cancelar" value="Cancelar">

                                                    <form action="{{route('agendamento.destroy',['agendamento' => $item->id])}}" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <input type="submit" class="deletar" value="Deletar">
                                                    </form>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- fim modal    --}}
                                        @endforeach

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>

            </div>

        </div>
    </div>



    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{ asset('site/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('site/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('site/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('site/bootstrap/js/bootstrap.min.js') }}"></script>

    {{-- script modal  --}}
    <script>
        function deletar(id) {

            var id1 = id;

            let modalabrir = document.getElementById('abrirmodal' + id);
            modalabrir.style.display = 'flex';
        }

        function fechar1(id) {
            let modalabrir = document.getElementById('abrirmodal' + id);
            modalabrir.style.display = 'none';
        }

        function fechar2(id) {
            let modalabrir = document.getElementById('abrirmodal' + id);
            modalabrir.style.display = 'none';
        }

    </script>

    {{-- fim script modal  --}}
</body>

</html>


