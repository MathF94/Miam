<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Receipe;
use App\Models\Image;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ReceipeController extends Controller
{
    /**
     * Display a listing of the receipes.
     */
    public function index(): View
    {
        $receipes = Receipe::all();
        $user = auth()->user();
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
     * 
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
        // $request->file->move(public_path('images'));
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
        
        // dd('recette créée');

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
    }

    public function destroy(string $id)
    {
        $receipe = Receipe::find($id);
        $receipe->delete();
        return redirect('/')->with('status', 'Recette supprimée');
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(string $id)
    // {
    //
    // }

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
        die(var_dump($request));
        $request->validate([
            'user_id' => 'nullable',
            'file' => 'required',
            'receipe_name' => 'required',
            'time_cook' => 'required',
            'ingredients' => 'required',
            'description' => 'required',
        ]);

        $user = auth()->user();
        $receipes = Receipe::find([
            'user_id' => $user->id,
            'file' => $request->file,
            'receipe_name' => $request->receipe_name,
            'time_cook' => $request->time_cook,
            'ingredients' => $request->ingredients,
            'description'  => $request->description,
        ]);

        event(new Registered($receipes));

        return redirect('/receipe/{{$user->id}}')->with('status', 'la recette a bien été modifiée');
    }


}
