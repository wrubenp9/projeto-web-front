<?php

namespace App\Http\Controllers;

use App\Models\Agendamento;
use App\Http\Requests\StoreAgendamentoRequest;
use App\Http\Requests\UpdateAgendamentoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AgendamentoController extends Controller
{
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
            $agendamento_index = Http::get('localhost:8000/api/agendamento',[

                'filtro' => "$request->nome:$request->pesquisa",
                'limit' => $request->limit,

            ])->object();
        }else{
            $agendamento_index = Http::get('localhost:8000/api/agendamento')->object();
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
            'nome' => 'required|alpha|min:3',
            'telefone' => 'required|numeric',
            'data' => 'required'
        ];
        $feedback = [
            'required' => 'O campo :attribute e obrigatorio',
            'numeric' => 'O campo :attribute so aceita Numero',
            'alpha' => 'O campo :attribute so aceita letras',
            'min' => 'O campo :attribute aceita no minimo 3 letras'

        ];

        $request->validate($regras, $feedback);

        // dd([$request->all()]);

        $agendamento_index = Http::post('localhost:8000/api/agendamento',[

            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'favorito' => $request->favorito,
            'data' => $request->data
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
        $agendamento_edit = Http::get('localhost:8000/api/agendamento/'.$id)->object();

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
        //
        // dd([$request->all()]);

        $agendamento_update = Http::post('localhost:8000/api/agendamento/'.$id,[

            'nome' => $request->nome,
            'telefone' => $request->telefone,
            'favorito' => $request->favorito,
            'data' => $request->data,
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
        //
        // dd($id);

        $agendamento_update = Http::delete('localhost:8000/api/agendamento/'.$id);

        return redirect()->route('agendamento.index');
    }
}
