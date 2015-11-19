<?php

namespace milimetrica\Http\Controllers;

use Illuminate\Http\Request;
use milimetrica\Http\Requests;
use milimetrica\Http\Controllers\Controller;
use milimetrica\Texto;

class TextoController extends Controller
{
    private $textoModel;

    public function __construct(Texto $textoModel){

        $this->textoModel = $textoModel;
    }
    public function index(){
        $quemsomos = $this->textoModel->get();

        return view('quemsomos.index',compact('quemsomos'));

    }

    public function create(){
        return view('quemsomos.create');

    }

    public function edit($id){
        $quemsomos = $this->textoModel->find($id);
        return view('quemsomos.edit',(compact('quemsomos')));
    }

    public function update(Requests\CategoryRequest $request, $id){
        $this->textoModel->find($id)->update($request->all());
        return redirect()->route('quemsomos');

    }
    public function store(Requests\CategoryRequest $request){

        $input = $request->all();
        $quemsomos = $this->textoModel->fill($input);
        $quemsomos->save();
        return redirect()->route('quemsomos');
    }

    public function destroy($id){
        $this->textoModel->find($id)->delete();
        return redirect()->route('quemsomos');

    }
}