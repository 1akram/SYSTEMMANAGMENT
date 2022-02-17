<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Component;
use App\Models\MotherBoard;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
class MotherBoardController extends Controller
{
    //
    public function get(){

        $components=Component::all();
        $motherBoards=MotherBoard::all();

        return view('motherBoard',compact(
            'components',
            'motherBoards',
        ));
    }
    public function show ($id){

        $motherBoard =MotherBoard::find($id);
        if(empty($motherBoard))
            return ;
        return view('includes.motherBoardDetails',compact(
            'motherBoard',
        ));
    }


    public function save(Request $request){
        $validator=Validator::make($request->all(), [ // validate user inputs
            
            'image' =>'nullable|mimes:jpeg,png,jpg|max:2048',  
            'brand' => 'required', 
            'refrence' => 'required',
            'components'=>'required',
            'components.*'=>'exists:components,id'
          
        ],)->validate();
        
        $motherBoard=new MotherBoard();
        $motherBoard->brand=$request->brand;
        $motherBoard->refrence=$request->refrence;

        if($request->hasFile('image')){ // check if image uploaded
            $motherBoard->url='storage/'.$request->image->store('images','public') ;
        }
         
        $motherBoard->save();
        $motherBoard->components()->attach($request->components);
        
        return redirect()->back()->with('success', 'add seccessfuly' ); //return with success messege
    }

    public function edit($id){
        $motherBoard =MotherBoard::find($id);
        $components=Component::all();
        if(empty($motherBoard))
            return ;
        return view('includes.editMotherBoard',compact(
            'motherBoard',
            'components',
        ));
    }

    public function update(Request $request){
        $motherBoard=MotherBoard::find($request->id); 
        if(empty($motherBoard))  
           return   redirect()->back()->with('error', 'motherboard not existe' ); 

        $validator=Validator::make($request->all(), [ // validate user inputs
        
        'image' =>'nullable |mimes:jpeg,png,jpg|max:2048',  
        'brand' => 'required', 
        'refrence' => 'required',
        'components'=>'nullable',
        'components.*'=>'exists:components,id',

          
        ],)->validate();
         
       
        $motherBoard->brand=$request->brand;
        $motherBoard->refrence=$request->refrence;
      
        if($request->hasFile('image')){ // check if image uploaded
       
            if(!empty($motherBoard->url) ){ 
                 
                Storage::disk("public")->delete(str_replace('storage/' ,'',$motherBoard->url));
                $motherBoard->url='storage/'.$request->image->store('images','public') ;
                

            }else{// if   don't have image before create new one
                
                $motherBoard->url='storage/'.$request->image->store('images','public') ;
            }
        }
        $motherBoard->components()->sync($request->components);
        $motherBoard->save();
        
        
        return redirect()->back()->with('success', 'updated seccessfuly' ); //return with success messege
    }
    
    public function delete($id){
        $motherBoard=MotherBoard::find($id);
        Storage::disk("public")->delete(str_replace('storage/' ,'',$motherBoard->url));
        $motherBoard->components()->sync([]);
        $motherBoard->delete();
        return redirect()->back()->with('success', 'deleted seccessfuly' ); //return with success messege
    }
}
