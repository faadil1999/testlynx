<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\Evenement;
use Illuminate\Http\Request;
use App\Http\Requests\PostPutEventRequest;

class EventController extends Controller
{
    //

    public function index()
    {
     
        $evenements = Evenement::orderBy('created_at','DESC')->get();
        
        return Inertia::render('Events/Index',['evenements'=> $evenements]);

    }

    public function show($id){

        $evenement =  Evenement::findOrFail($id);

        return Inertia::render('Events/Show',['evenement'=> $evenement]);

    }

    public function store(PostPutEventRequest $request)
    {
       
        $validated = $request->validated();
  
        Evenement::create($request->all());
        return redirect()->route('evenements.index')->with('success','Événement créé avec succès');
    }
//la fonction permettant davoir acces a levenement que nous souhaitons modifier
    public function edit($id)
    {
     
        $evenement =  Evenement::findOrFail($id);

        return Inertia::render('Events/Edit',['evenement'=> $evenement]);

    }
//Cette fonction prend une requête (request) contenant les nouvelles données qui seront modifiées.
    public function update(PostPutEventRequest $request,$id)
    {
       $evenement = Evenement::findOrFail($id);
       $evenement->update($request->all());

       return redirect()->route('evenements.index')->with('success','Événement modifier avec succès');
    }

    
    public function delete($id)
    {
        $evenement = Evenement::findOrFail($id);
        $evenement->delete();
        return redirect()->route('evenements.index')->with('success','Événement supprimer avec succès');
    }


    //fonction pour le dateRangePicker
    public function search(Request $request)
    {
        
        $evenements = Evenement::dateRange($request)->get();

        return Inertia::render('Events/Index',['evenements'=> $evenements]);
    }

}
