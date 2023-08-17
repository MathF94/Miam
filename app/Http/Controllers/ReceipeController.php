<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Receipe;
use App\Models\Image;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReceipeController extends Controller
{
    /**
     * Display a listing of the receipes.
     */
    public function index(): View
    {
        $receipes = Receipe::all();
        return view('welcome', compact('receipes'));
    }

    /**
     * Display the form for adding a new receipe.
     */
    public function create(): View
    {
        return view('receipe.form');
    }

    /**
     * Show the form for creating a new receipe.
     */
    public function store(Request $request)
    {
        $user = auth()->user();
        $request->validate([
            'user_id' => 'nullable',
            'file' => 'required|image',
            'receipe_name' => 'required',
            'time_cook' => 'required',
            'ingredients' => 'required',
            'description' => 'required',
        ]);

        $filename = time() . '.' . $request->file->extension();
        $path = $request->file('file')->storeAs (
            'images',
            $filename,
            'public'
        );

        $receipe = Receipe::create([
            'user_id' => $user->id,
            'file' => $filename,
            'receipe_name' => $request->receipe_name,
            'time_cook' => $request->time_cook,
            'ingredients' => $request->ingredients,
            'description'  => $request->description,
        ]);

        $image = new Image(['path' => $path]);
        // $image->path = $path;
        $receipe->image()->save($image);

        // cela permet d'enregistrer automatiquement l'id du $receipe auquel est lié l'image en base de donnée sans avoir à l'indiuer manuellement
        // comme ça : 
        // $image->post_id = $receipe->id;
        
        // dd($receipe);

        event(new Registered($receipe));
        return redirect('/')->with('status', 'la recette a bien été ajoutée');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $receipe = Receipe::find($id);
        return view('receipe.receipe', compact('receipe'));
        // compact () permet de rentrer les infos de la variable receipe dans la vue
    }

    public function destroy(string $id)
    {
        $receipe = Receipe::find($id);
        $receipe->delete();
        return redirect('/')->with('status', 'Recette supprimée');
    }

    //

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        $receipes = Receipe::find($id);
        return view ('receipe.update', compact('receipes'));
    }

    public function update_treatment(Request $request) 
    {
        $request->validate([
            // 'user_id' => 'nullable',
            'file' => 'required|image',
            'receipe_name' => 'required',
            'time_cook' => 'required',
            'ingredients' => 'required',
            'description' => 'required',
        ]);
        
        $receipe = Receipe::find($request->id);
        if (!$receipe) {
            return redirect()->back()->with('error', 'La recette n\'existe pas');
        }
        $receipe->user_id = $request->user_id;
        $receipe->file = $request->file;
        $receipe->receipe_name = $request->receipe_name;
        $receipe->time_cook = $request->time_cook;
        $receipe->ingredients = $request->ingredients;
        $receipe->description = $request->description;

        $receipe->update();

        if ($request->hasFile('file')) {
            $filename = time() . '.' . $request->file->extension();
            $path = $request->file('file')->storeAs(
                'images',
                $filename,
                'public'
            );
            $receipe->file = $path; 
        }  
    
        $receipe->save();
        return redirect('/receipe/' . $receipe->id)->with('status', 'La recette a bien été modifiée');
    }
}
