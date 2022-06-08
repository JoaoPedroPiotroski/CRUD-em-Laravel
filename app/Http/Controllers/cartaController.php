<?php

namespace App\Http\Controllers;

use App\Http\Controllers\DatabaseController;
use Illuminate\Http\Request;
use App\Models\Carta;

class cartaController extends Controller
{
    //
    function detail($id){
        return view('carddetail', compact('id'));
    }

    function criar() {
        return view('create');
    }

    function listarCartas(){
        return view('displaycards');
    }

    function inserirMinicard() {
        return view('layouts.minicard');
    }

    function inserirCarta(Request $request) {
        if ($request){
            $carta = new Carta;
            $carta->name = $request->name;
            $carta->class = $request->class;
            $carta->desc = $request->desc;
            $carta->arquivo = $request->arquivo;
            $carta->save();
        }

        return view('displaycards');
    }

    function deletarCarta($id=0) {
        $carta = Carta::find($id);
        $carta->delete();
        return view('index');
    }
    function editarCarta($id=0) {
        $carta = Carta::find($id);
        return view('editar', compact('carta', 'id'));
    }
    public function update(Request $request, $id)
    {
        return "uwu";
        $carta = Carta::find($id);
        $erros = [];

        if (!$request->name) {
           array_push($erros, 'Nome é um campo obrigatório');
        }
        if (!$request->class) {
           array_push($erros, 'Classe é um campo obrigatório');
        }
        if (!$request->desc) {
           array_push($erros, 'Descrição é um campo obrigatório');
        }
        if (!$request->arquivo){
            array_push($erros, "A imagem é um capo obrigatório");
        }

        if (strlen($request->name) > 20) {
           array_push($erros, 'Nome deve ser menor que 20 caracteres');
        }
        if (strlen($request->class) > 20) {
           array_push($erros, 'Classe deve ser menor que 20 caracteres');
        }
        if (strlen($request->desc) > 100) {
           array_push($erros, 'Descrição deve ser menor que 100 caracteres');
        }

        if ($request){
            $carta = new Carta;
            $carta->name = $request->name;
            $carta->class = $request->class;
            $carta->desc = $request->desc;
            if ($request->hasFile('arquivo')){
            if ($request->file('arquivo')->isValid()) {
                $img = $request->file('arquivo');

                $nomearquivo = md5($request->user).md5($request->name);

                //$path = $request->arquivo->storeAs('imgup', $nomearquivo.'.'.$img->extension());
                $caminhoarquivo =  $nomearquivo.'.'. $img->extension();
                //return $caminhoarquivo;
                $path = $img->storeAs('imgup', $caminhoarquivo, 'public');
                //Storage::disk('local')->put('imgup/'. $caminhoarquivo, $img);
                //put('imgup/'.$nomearquivo.'.'.$img->extension(), $request->arquivo);
                //return $path.$nomearquivo;

                $carta->arquivo = 'imgup/'.$caminhoarquivo;



            } else {
               array_push($erros, 'Imagem não foi enviada com sucesso');
            }
        }else {
            array_push($erros, 'Imagem não foi enviada com sucesso');
         }
        }
        $carta->owner = json_decode($request->user);

        if (sizeof($erros) > 0){
            return view('create', ['erros' => $erros]);
        }
        $carta->save();
        return redirect()->route('results');
    }
    function critarCarta() {
        return "Criei a carta juro";
    }

}
