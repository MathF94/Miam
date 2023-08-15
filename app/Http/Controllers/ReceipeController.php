<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Receipe;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

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
            'file' => 'required',
            'receipe_name' => 'required',
            'time_cook' => 'required',
            'ingredients' => 'required',
            'description' => 'required',
        ]);

        $filename = time() . '.' . $request->file->extension();

        $path = $request->file('file')->storeAs(
            'images',
            $filename,
            'public'
        );

        $Receipe = Receipe::create([
            'user_id' => $user->id,
            'username' => $user->username,
            'file' => $request->file,
            'receipe_name' => $request->receipe_name,
            'time_cook' => $request->time_cook,
            'ingredients' => $request->ingredients,
            'description'  => $request->description,
        ]);

        $request->file->move(public_path('images'));

        event(new Registered($Receipe));

        return redirect('/')->with('status', 'la recette a bien été ajoutée');

        // @todo : traitement du fichier (file storage voir vidéo)
        // @todo : sur home, lister les requêtes que j'ai en base
    }

    /**
     * Display the specified resource.
     */
    public function show(string $user_id)
    {
        $receipes = Receipe::all();
        return view('receipe.receipe', compact('receipes'));
    }

    public function destroy(string $id)
    {

        $receipe = Receipe::find($id);
        $receipe->delete();
        return redirect('/receipe')->with('status', 'Recette supprimée');
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
    // public function update(string $id)
    // {
    //     $receipes = Receipe::find($id);
    //     return view ('receipe.update', compact('receipes'));
    // }

    // public function update_treatment(Request $request) 
    // {
    //     die(var_dump($request));
    //     $request->validate([
    //         'user_id' => 'nullable',
    //         'file' => 'required',
    //         'receipe_name' => 'required',
    //         'time_cook' => 'required',
    //         'ingredients' => 'required',
    //         'description' => 'required',
    //     ]);


    //     $user = auth()->user();
    //     $receipes = Receipe::find([
    //         'user_id' => $user->id,
    //         'file' => $request->file,
    //         'receipe_name' => $request->receipe_name,
    //         'time_cook' => $request->time_cook,
    //         'ingredients' => $request->ingredients,
    //         'description'  => $request->description,
    //     ]);

    //     event(new Registered($receipes));

    //     return redirect('/receipe/{{$user->id}}')->with('status', 'la recette a bien été modifiée');
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     //
    // }
}
