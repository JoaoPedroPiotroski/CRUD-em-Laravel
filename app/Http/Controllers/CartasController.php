<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carta;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;


class CartasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $values = DB::table('cartas')->paginate(6);
        //return $values;
        //$values = $values->get(['id', 'name', 'arquivo']);
        //$names = Carta::get('name');

        return view('displaycards', ['values' => $values]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $erros = [];

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
            }
        }else {
         }
        }
        $carta->owner = json_decode($request->user);


        $this->validate($request, $carta->rules, $carta->messages);
        $carta->save();
        return redirect()->route('results');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $params = Carta::where('id', $id)->get(['name', 'class', 'owner', 'desc', 'arquivo']);
        $params = $params[0];
        //return $params;
        return view('carddetail', [
            'id' => $id,
            'name' => $params['name'],
            'class' =>$params['class'],
            'owner' =>$params['owner'],
            'desc' =>$params['desc'],
            'arquivo' =>$params['arquivo']
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carta = Carta::find($id);
        $erros = [];

        $this->validate($request, $carta->rulesalt, $carta->messages);

        if ($request){
            $carta->name = $request->name;
            $carta->class = $request->class;
            $carta->desc = $request->desc;
            if ($request->hasFile('arquivoinput')){
            if ($request->file('arquivoinput')->isValid()) {
                $img = $request->file('arquivoinput');

                $nomearquivo = md5($request->user).md5($request->name);

                //$path = $request->arquivo->storeAs('imgup', $nomearquivo.'.'.$img->extension());
                $caminhoarquivo = $nomearquivo.'.'. $img->extension();
                //return $caminhoarquivo;
                $path = $img->storeAs('imgup', $caminhoarquivo, 'public');
                //Storage::disk('local')->put('imgup/'. $caminhoarquivo, $img);
                //put('imgup/'.$nomearquivo.'.'.$img->extension(), $request->arquivo);
                //return $path.$nomearquivo;

                $carta->arquivo = 'imgup/'.$caminhoarquivo;



            } else {
            }
        }else {
            $carta->arquivo = $request->arqtemp;
        }
        }
        $carta->owner = $request->user;

        $carta->save();
        return redirect()->route('results');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "oi";
        $carta = Carta::find($id);
        $carta->delete();
        return view('index');
    }
}
