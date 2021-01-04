<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NoticiaModel;
use App\Models\AutorModel;
use App\Models\CategoriaModel;
use DateTime;
class NoticiaController extends Controller
{
    private $noticia, $autor,$categoria;
    public function __construct(){
        $this->autor = new AutorModel();
        $this->noticia = new NoticiaModel();
        $this->categoria = new CategoriaModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $noticias = $this->noticia->all();
      return view('noticia',compact('noticias'));
    }
    function listaNoticia(){
      $noticias = $this->noticia->all();
      return view('blog_noticias',compact('noticias'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticia_create',[
          "autores"=>$this->autor->all(),
          "categorias"=>$this->categoria->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if($this->noticia->create([
        'title'=>$request->title,
        'description'=>$request->description,
        'autor_id'=>$request->autor_id,
        'categoria_id'=>$request->categoria_id,
        'created_at'=>new DateTime(),
        'updated_at'=>new DateTime()
      ])){
        return redirect('noticia');
      }else{
        return redirect('noticia/create');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $noticia = $this->noticia->find($id);
      $autor = $noticia->find($id)->autor;
      $categoria = $noticia->find($id)->categoria;
      return view('noticia_create',[
        'noticia'=>$noticia,
        'autores'=>$this->autor->all(),
        "categorias"=>$this->categoria->all(),
        'categoria_selecionado'=>$categoria,
        'autor_selecionado'=>$autor
      ]);
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
      if($this->noticia->where(['id'=>$id])->update([
        'title'=>$request->title,
        'description'=>$request->description,
        'autor_id'=>$request->autor_id,
        'categoria_id'=>$request->categoria_id,
        'updated_at'=>new DateTime()
      ])){
        return redirect('noticia');
      }else{
        return redirect('noticia/create');
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
      $del = $this->noticia->destroy($id);
      return $del ? "deleted" : "not deleted";
    }
}
