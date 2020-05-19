<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Clase;
use App\User;
use App\Curso;
use Auth;
use App\Http\Requests\ClaseRequest;
//use App\Exports\ArticlesExport;


class ClaseController extends Controller
{
    //este metodo es para hacer que despues del logueo no vuelva a iniciar sesion solo con el link, es darle seguridad a la vista
    public function __constructor(){
        return $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->role == 'admin')
        {
            $clases = Clase::paginate(10);
            return view('clases.index')->with('clases',$clases);
        }
        // else
        // {
        //     $id = Auth::user()->id;
        //     $clases = Clase::where('user_id','=', $id)->paginate(10);
        //     return view('clases.myclases')->with('clases',$clases);
        // }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user          = Auth::user();
        $cursos        = Curso::all();
        return view('clases.create')->with('user',$user)->with('cursos',$cursos);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Almacenamiento de datos
        //dd($request->all());
        $clase = new Clase;
        $clase->name               = $request->name;
        $clase->description        = $request->description;
        $clase->nameinstru         = $request->nameinstru;
        if($request->hasFile('instrucciones')){
            $file = time().'.'.$request->instrucciones->getClientOriginalName();
            $request->instrucciones->move(public_path('pdf'),$file);
            $clase->instrucciones = 'pdf/'.$file;
        }

        if($request->hasFile('present')){
            $file = time().'.'.$request->present->getClientOriginalName();
            $request->present->move(public_path('presentaciones'),$file);
            $clase->present = 'presentaciones/'.$file;

            if($request->hasFile('present_2')){
                $file = time().'.'.$request->present_2->getClientOriginalName();
                $request->present_2->move(public_path('presentaciones'),$file);
                $clase->present_2 = 'presentaciones/'.$file;
            }
        }
        
        $clase->user_id            = Auth::user()->id;
        $clase->curso_id           = $request->curso;       
        $clase->pdrive             = $request->pdrive;
        $clase->pdrive_2           = $request->pdrive_2;
        $clase->formulario         = $request->formulario;
        $clase->formulario_2       = $request->formulario_2;
        
        if($clase->save()){
            return redirect('clases')->with('message', 'La Clase: '.$clase->name.', fue Adicionada con Exito!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user       = Auth::user();
        $clase      = Clase::find($id);
        $curso      = Curso::find($clase->curso_id);
        return view('clases.show')->with('clase', $clase)->with('user', $user)->with('curso', $curso);
        // $clase = clase::find($id);
        // return view('clases.show')->with('clase',$clase);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clase      = clase::find($id);
        $user       = Auth::user();
        $cursos     = Curso::all();
        return view('clases.edit')->with('clase', $clase)->with('user', $user)->with('cursos', $cursos);
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
        //dd($request->all());

        //Modificar usuario
        $clase =                   Clase::find($id);
        $clase->name               = $request->name;
        $clase->description        = $request->description;
        $clase->nameinstru         = $request->nameinstru;
        if($request->hasFile('instrucciones')){
            $file = time().'.'.$request->instrucciones->getClientOriginalName();
            $request->instrucciones->move(public_path('pdf'),$file);
            $clase->instrucciones = 'pdf/'.$file;
        }

        if($request->hasFile('present')){
            $file = time().'.'.$request->present->getClientOriginalName();
            $request->present->move(public_path('presentaciones'),$file);
            $clase->present = 'presentaciones/'.$file;

            if($request->hasFile('present_2')){
                $file = time().'.'.$request->present_2->getClientOriginalName();
                $request->present_2->move(public_path('presentaciones'),$file);
                $clase->present_2 = 'presentaciones/'.$file;
            }
        }
        
        $clase->user_id            = Auth::user()->id;
        $clase->curso_id           = $request->curso;       
        $clase->pdrive             = $request->pdrive;
        $clase->pdrive_2           = $request->pdrive_2;
        $clase->formulario         = $request->formulario;
        $clase->formulario_2       = $request->formulario_2;

        if($clase->save()){
            return redirect('clases')->with('message', 'La Clase: '.$clase->name.', fue Modificada con Exito!');
        }else{
            return redirect('clases')->with('message', 'La clase: '.$clase->name.', No pudo ser modificada. Intentelo de nuevo');
        }
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $clase = Clase::find($id);
        if ($clase->delete()) {
            return redirect('clases')->with('message', 'La Clase: '.$clase->name.', fue Eliminada con Exito!');
        }
    }

    // ***********************************FUNCIONES DEL EDITOR************************
    // public function myclases()
    // {
    //     $id     = Auth::user()->id;
    //     $clases = Clase::paginate(10);
    //     return view('clases.myclases')->with('clases',$clases);
    // }

    // }
    // public function editorcreate(){
    //     $user          = Auth::user();
    //     $categ    = Category::all();
    //     return view('editor.create')->with('user',$user)->with('categories',$categ);
    // }
    // public function showeditor($id)
    // {
    //     $user       = Auth::user();
    //     $article    = Article::find($id);
    //     $category   = Category::find($article->category_id);
    //     return view('editor.show')->with('article', $article)->with('user', $user)->with('category', $category);
    // }

    // public function updarticle(Request $request, $id)
    // {
    //     $article        = Article::find($id);
    //     $user           = Auth::user();
    //     $categories     = Category::all();
    //     return view('editor.edit')->with('article', $article)->with('user', $user)->with('categories', $categories);
    // }
}
