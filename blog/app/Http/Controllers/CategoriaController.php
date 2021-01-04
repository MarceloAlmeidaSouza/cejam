<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriaRequest;
use App\Models\CategoriaModel;
use DateTime;
class CategoriaController extends Controller
{
    private $categoria;
    function __construct(){
      $this->categoria = new CategoriaModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $categorias = $this->categoria->all();
      return view('categoria',compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categoria_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriaRequest $request)
    {
        if($this->categoria->create([
          'name'=>$request->name,
          'created_at'=>new DateTime(),
          'updated_at'=>new DateTime()
        ])){
          return redirect('categoria');
        }else{
          return redirect('categoria/create');
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
      $categoria = $this->categoria->find($id);
      return view('categoria_create',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriaRequest $request, $id)
    {
      if($this->categoria->where(['id'=>$id])->update([
        'name'=>$request->name,
        'updated_at'=>new DateTime()
      ])){
        return redirect('categoria');
      }else{
        return redirect('categoria/create');
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
      $del = $this->autor->destroy($id);
      return $del ? "deleted" : "not deleted";
    }
}
