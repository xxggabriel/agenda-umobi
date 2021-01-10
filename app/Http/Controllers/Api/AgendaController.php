<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function listarAgenda(Request $request)
    {
        $agenda = Agenda::where("apagado", 0);
        
        if($request->input("id")){
            $dados = $agenda->where("id", $request->input("id"))->first();
            return $this->respostaPadrao($dados, false, null);
        }
        
        return $this->respostaPadrao($agenda->orderBy('updated_at', 'desc')->paginate(5), false, null);
    }


    public function adicionar(Request $request)
    {
        $this->validate($request, $this->regras(), $this->mensagens());

        $telefone = preg_replace("/[^0-9]/", "", $request->input("telefone"));

        $agenda = new Agenda();
        $agenda->nome = $request->input("nome");
        $agenda->telefone = $telefone;
        $agenda->assunto = $request->input("assunto");
        $resultado = $agenda->save();

        if(!$resultado){
            return $this->respostaPadrao(null, true, "Ocorreu um erro ao salvar no banco de dados. Tente novamente.");
        }

        return $this->respostaPadrao();
    }



    public function atualizar(Request $request, $id)
    {
        $this->validate($request, $this->regras(), $this->mensagens());

        $telefone = preg_replace("/[^0-9]/", "", $request->input("telefone"));

        $agenda = Agenda::where("id", $id)->first();
        $agenda->nome = $request->input("nome");
        $agenda->telefone = $telefone;
        $agenda->assunto = $request->input("assunto");
        $resultado = $agenda->save();

        if(!$resultado){
            return $this->respostaPadrao(null, true, "Ocorreu um erro ao salvar no banco de dados. Tente novamente.");
        }

        return $this->respostaPadrao();
    }

    public function deletar($id)
    {
        $agenda = Agenda::where("id", $id)->first();
        $agenda->apagado = 1;
        $resultado = $agenda->save();

        if(!$resultado){
            return $this->respostaPadrao(null, true, "Erro ao deletar, tente novamente mais tarde");
        }

        return $this->respostaPadrao();
    }

    public function respostaPadrao($data = [], $error = false, $message = null)
    {
        return [
            "error" => false,
            "message" => $message,
            "data" => $data
        ];
    }

    public function regras()
    {
        return [
            "nome" => "required|max:255",
            "telefone" => "required|max:15",
            "assunto" => "",
        ];
    }

    public function mensagens()
    {
        return [
            "required" => "O campo :attribute é obrigatório",
            "max" => "O campo :attribute aceita no máximo :max caracteres.",
        ];
    }
}
