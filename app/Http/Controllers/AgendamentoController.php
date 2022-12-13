<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Http\Requests\StoreAgendamentoRequest;
use App\Http\Requests\UpdateAgendamentoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;



class AgendamentoController extends Controller
{

    public function home(){

        return view('site.index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dd([$request->nome,$request->limit,$request->pesquisa]);
        if($request->pesquisa){
            $agendamento_index = Http::get('http://login.developrt.com/api/login',[

                'filtro' => "$request->nome:$request->pesquisa",
                'limit' => $request->limit,

            ])->object();
        }else{
            $agendamento_index = Http::get('http://login.developrt.com/api/login')->object();


        }
            // dd($agendamento_index);

        return view('site.agendamento',compact('agendamento_index'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('site.agendamento-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAgendamentoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $regras = [
            'nome' => 'required|alpha|min:4',
            'sobrenome' => 'required|alpha|min:4',
            'email' => 'required|email',
            'senha' => 'required|min:4',
        ];
        $feedback = [
            'required' => 'O campo :attribute e obrigatorio',
            'alpha' => 'O campo :attribute so aceita letras',
            'min' => 'O campo :attribute aceita no minimo 4 letras',
            'email' => 'O campo :attribute tem que ser um Email valido',
            'in' => 'O campo :attribute so aceita ADM OU visitante',

        ];

        $request->validate($regras, $feedback);

        // dd([$request->all()]);

        $agendamento_index = Http::post('http://login.developrt.com/api/login',[

            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'email' => $request->email,
            'senha' => $request->senha,
            'type' => $request->type,
        ]);

        return redirect()->route('agendamento.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $agendamento_edit = Http::get('http://login.developrt.com/api/login/'.$id)->object();


        // dd([$agendamento_edit]);
        return view('site.agendamento-edit', compact('agendamento_edit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAgendamentoRequest  $request
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $agendamento_update = Http::post('http://login.developrt.com/api/login/'.$id,[

            'nome' => $request->nome,
            'sobrenome' => $request->sobrenome,
            'email' => $request->email,
            'senha' => $request->senha,
            'type' => $request->type,
            '_method' => $request->_method

        ]);

        return redirect()->route('agendamento.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agendamento  $agendamento
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $agendamento_update = Http::delete('http://login.developrt.com/api/login/'.$id);

        return redirect()->route('agendamento.index');
    }
}
