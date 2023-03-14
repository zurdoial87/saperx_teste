<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use DB;

class AgendaController extends Controller
{
    public function index()
    {
        return view('agenda');
    } 

    public function getAll()
    {
        $result = Agenda::all();
        return $result;

        
    }

        
    public function store(Request $request)
    {  
        
        $this->validate($request,[
            'nome' => ['required'],
            'email' => ['required'],
            'data_nascimento' => ['required'],
            'cpf' => ['required'],
            'telefone1' => ['required']            
            
        ],[
            'nome.required' => 'O campo nome não pode ser vazio',
            'email.required' => 'O campo email não pode ser vazio',
            'data_nascimento.required' => 'O campo data de nascimento não pode ser vazio',
            'cpf.required' => 'O campo cpf não pode ser vazio',
            'telefone1.required' => 'O campo telefone 1 não pode ser vazio'            
        ]);                

        Agenda::create($request->all());

        return  "success";

    }

    public function show(Agenda $agenda)
    {       
       return $agenda;
    } 

    public function update(Request $request)
    {
                
        $student = Agenda::find($request->id)->update($request->all());
        return "success";

    }

    public function destroy($id)
    {
        $student = Agenda::find($id)->delete();
        return "success";
    }
}
