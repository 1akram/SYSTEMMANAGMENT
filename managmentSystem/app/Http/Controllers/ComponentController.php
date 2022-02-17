<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Component ;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ComponentController extends Controller
{
    //
    public function get(){

        $components=Component::all();

        return view('component',compact(
            'components',
        ));
    }
    public function show ($id){

        $component =Component::find($id);
        if(empty($component))
            return ;
        return view('includes.componentDetails',compact(
            'component',
        ));
    }
    public function save(Request $request){
        $validator=Validator::make($request->all(), [ // validate user inputs
            
            'image' =>'nullable|mimes:jpeg,png,jpg|max:2048',  
            'type' => 'required', 
            'model' => 'required', 
            'refrence' => 'required'
          
        ],)->validate();
        
        $component=new Component();
        $component->type=$request->type;
        $component->model=$request->model;
        $component->refrence=$request->refrence;

        if($request->hasFile('image')){ // check if image uploaded
            $component->url='storage/'.$request->image->store('images','public') ;
        }
        $component->save();
       
        
        return redirect()->back()->with('success', 'add seccessfuly' ); //return with success messege
    }
    public function edit($id){
        $component =Component::find($id);
        if(empty($component))
            return ;
        return view('includes.editComponent',compact(
            'component',
        ));
    }
    public function update(Request $request){
        $component=Component::find($request->id); 
        if(empty($component))  
           return   redirect()->back()->with('error', 'component not existe' ); 

        $validator=Validator::make($request->all(), [ // validate user inputs
        
        'image' =>'nullable |mimes:jpeg,png,jpg|max:2048',  
        'type' => 'required', 
        'model' => 'required', 
        'refrence' => 'required'
          
        ],)->validate();
         
       
        $component->type=$request->type;
        $component->model=$request->model;
        $component->refrence=$request->refrence;
      
        if($request->hasFile('image')){ // check if image uploaded
       
            if(!empty($component->url) ){ 
                 
                Storage::disk("public")->delete(str_replace('storage/' ,'',$component->url));
                $component->url='storage/'.$request->image->store('images','public') ;
                

            }else{// if   don't have image before create new one
                
                $component->url='storage/'.$request->image->store('images','public') ;
            }
        }
        $component->save();
       
        
        return redirect()->back()->with('success', 'updated seccessfuly' ); //return with success messege
    }
    public function delete($id){
        $component=Component::find($id);
        Storage::disk("public")->delete(str_replace('storage/' ,'',$component->url));
        $component->motherBoards()->sync([]);
        $component->delete();
        return redirect()->back()->with('success', 'deleted seccessfuly' ); //return with success messege
    }
}
