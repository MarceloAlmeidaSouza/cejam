<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutorRequest;
use App\Models\AutorModel;
use DateTime;
class AutorController extends Controller
{
    private $autor;
    public function __construct(){
        $this->autor = new AutorModel();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autores = $this->autor->all();
        return view('autor',compact('autores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autor_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AutorRequest $request)
    {
        if($this->autor->create([
          'name'=>$request->name,
          'created_at'=>new DateTime(),
          'updated_at'=>new DateTime()
        ])){
          return redirect('autor');
        }else{
          return redirect('autor/create');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $autor = $this->autor->find($id);
      return view('autor_create',compact('autor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AutorRequest $request, $id)
    {
      if($this->autor->where(['id'=>$id])->update([
        'name'=>$request->name,
        'updated_at'=>new DateTime()
      ])){
        return redirect('autor');
      }else{
        return redirect('autor/create');
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
