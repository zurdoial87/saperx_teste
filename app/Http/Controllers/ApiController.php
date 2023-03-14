<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agenda;

class ApiController extends Controller
{
    public function index()
    {
        $result = Agenda::all();               
        return    response()->json($result, 200);
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

        $agenda =Agenda::create($request->all());       
        return  response()->json(["mensaje"=>"Success", "data"=> $agenda], 200);
      
    }

    public function show($id)
    {       
       $agenda =Agenda::find($id);
       if(is_null($agenda)){

            return response()->json(["mensaje"=>"Registro não encontrado"], 200);

       }
       return response()->json(["mensaje"=>"Success", "data"=> $agenda], 200);
    } 

    public function update(Request $request, $id)
    {
       
       $agenda =Agenda::find($id);
       if(is_null($agenda)){

            return response()->json(["mensaje"=>"Registro não encontrado"], 200);

       }

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
        
        $result = $agenda->update($request->all());
        return response(["mensaje"=>"Success", "data"=> $result], 200);

    }

    public function destroy($id)
    {
       $agenda =Agenda::find($id);
       if(is_null($agenda)){

            return response()->json(["mensaje"=>"Registro não encontrado"], 200);

       }
        $agenda->delete();
        return response()->json(["mensaje"=>"Contato removido com sucesso"], 200);;
    }
}
