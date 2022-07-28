<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href=" {{ asset('site/css/agendamento.css') }}">
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
                       <a href="https://www.3wings.com.br/"><img src="{{ asset('site/img/logo.jfif') }}" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <main>
        <div class="main-box">
            <div class="main-box-tamanho">

                <div class="main-pesquisar">
                    <form action="{{ route('agendamento.index') }}" method="get" enctype="multipart/form-data">
                        @csrf

                        <label for="">
                            Campo :
                            <select name="nome" id="">
                                <option value="nome">NOME</option>
                                <option value="telefone">TELEFONE</option>
                                <option value="favorito">FAVORITO</option>
                                <option value="data">DATA</option>
                            </select>
                        </label>
                        <label for="">
                            Pagina :
                            <select name="limit" id="">
                                <option value="5">Paginação 5</option>
                                <option value="10">Paginação 10</option>
                                <option value="15">Paginação 15</option>
                                <option value="20">Paginação 20</option>
                            </select>
                        </label>

                        <label for="">
                            Pesquisa :
                            <input type="text" name="pesquisa" id="">
                        </label>

                        <label for="">
                            <input type="submit" value="pesquisar">
                        </label>
                    </form>
                </div>

            </div>
        </div>
    </main>

    <main>
        <div class="box">
            <div class="main-table-create">
                <label for=""><a href="{{Route('agendamento.create')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="30"
                            height="30" viewBox="0 0 24 24" stroke-width="2.9" stroke="currentColor" fill="none"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Novo Agendamento</a>
                </label>
            </div>
            <div class="box-tamanho">


                <div class="table">
                    <table class="table table-hover" style="margin:20px;">

                        <thead class="table-dark">
                            <tr>
                                <th scope="col">NOME</th>
                                <th scope="col">TELEFONE</th>
                                <th scope="col">FAVORITO</th>
                                <th scope="col">DATA</th>
                                <th scope="col">AÇOES</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($agendamento_index->data as $item)
                                <tr>
                                    <td>{{ $item->nome }}</td>
                                    <td>{{ $item->telefone }}</td>
                                    <td>{!! ($item->favorito == 'sim' ? '<span class="d-inline-block" tabindex="0" data-bs-toggle="tooltip" data-bs-title="favorito"> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star" width="25" height="25" viewBox="0 0 24 24" stroke-width="2.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <path d="M12 17.75l-6.172 3.245l1.179 -6.873l-5 -4.867l6.9 -1l3.086 -6.253l3.086 6.253l6.9 1l-5 4.867l1.179 6.873z" />
                                        </svg> </span>' : '<svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-star-off" width="25" height="25" viewBox="0 0 24 24" stroke-width="2.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                        <line x1="3" y1="3" x2="21" y2="21" />
                                        <path d="M10.012 6.016l1.981 -4.014l3.086 6.253l6.9 1l-4.421 4.304m.012 4.01l.588 3.426l-6.158 -3.245l-6.172 3.245l1.179 -6.873l-5 -4.867l6.327 -.917" />
                                        </svg>') !!}
                                    </td>
                                    <td>{{ $item->data }}</td>

                                    <td>
                                        <a href="{{route('agendamento.edit',['agendamento' => $item->id])}}"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit" width="32" height="32" viewBox="0 0 24 24" stroke-width="2" stroke="#00b341" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                            <line x1="16" y1="5" x2="19" y2="8" />
                                          </svg>
                                        </a>

                                        <button onclick="deletar('{{$item->id}}')">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash" width="25" height="25" viewBox="0 0 24 24" stroke-width="2" stroke="#ff2825" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
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
                                                                        <h1>DELETAR AGENDAMENTO</h1> <p onclick="fechar1({{$item->id}})">X</p>
                                                                    </div>

                                                                    <div class="abrimodal-texto">
                                                                        <p>Deseja mesmo apagar esse Agendamento ? DE: {{$item->nome}}</p>
                                                                    </div>
                                                                    <div class="abrimodal-button">
                                                                        <input type="submit" onclick="fechar2({{$item->id}})" class="cancelar" value="Cancelar">

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
    </main>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="{{ asset('site/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('site/bootstrap/js/bootstrap.bundle.js') }}"></script>
    <script src="{{ asset('site/bootstrap/js/bootstrap.js') }}"></script>
    <script src="{{ asset('site/bootstrap/js/bootstrap.min.js') }}"></script>

    {{-- script modal  --}}
<script>
    function deletar(id){

        var id1 = id;
        // alert(id1);
        let modalabrir = document.getElementById('abrirmodal'+id);
        modalabrir.style.display = 'flex';
    }
    function fechar1(id){
        let modalabrir = document.getElementById('abrirmodal'+id);
        modalabrir.style.display = 'none';
    }

    function fechar2(id){
        let modalabrir = document.getElementById('abrirmodal'+id);
        modalabrir.style.display = 'none';
    }
</script>

{{-- fim script modal  --}}
</body>

</html>
