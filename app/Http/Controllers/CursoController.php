<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use Auth;
//use App\Http\Requests\CategoryRequest;
//use App\Exports\CategoriesExport;

class CursoController extends Controller
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
            $cursos = Curso::paginate(10);
            return view('cursos.index')->with('cursos',$cursos);
        }else
        {
            $id = Auth::user()->id;
            $cursos = Curso::where('user_id','=', $id)->paginate(10);
            return view('cursos.prueba')->with('cursos',$cursos);
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cursos.create');
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
        $curso = new Curso;
        $curso->name               = $request->name;
        $curso->description        = $request->description;
        if($request->hasFile('image')){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'),$file);
            $curso->image = 'imgs/'.$file;
        }
        if($curso->save()){
            return redirect('cursos')->with('message', 'El Curso: '.$curso->name.' fue Adicionado con Exito!');
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
        $curso = Curso::find($id);
        return view('cursos.show')->with('curso',$curso);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curso = Curso::find($id);
        return view('cursos.edit')->with('curso', $curso);
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
        $curso = Curso::find($id);
        $curso->name               = $request->name;
        $curso->description        = $request->description;
        if($request->hasFile('image')){
            $file = time().'.'.$request->image->extension();
            $request->image->move(public_path('imgs'),$file);
            $curso->image = 'imgs/'.$file;
        }

        if($curso->save()){
            return redirect('cursos')->with('message', 'El Curso: '.$curso->name.' fue Modificado con Exito!');
        }else{
            return redirect('cursos')->with('message', 'El Curso: '.$curso->name.' No pudo ser modificado. Intentelo de nuevo');
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
        $curso = Curso::find($id);
        if ($curso->delete()) {
            return redirect('cursos')->with('message', 'El Curso: '.$curso->name.' fue Eliminado con Exito!');
        }
    }

    // Vistas cursos de editor o estudiante
    public function mycurso(){
        $cursos = Curso::paginate(10);
        return view('cursos.mycurso')->with('cursos',$cursos);
    }
}
