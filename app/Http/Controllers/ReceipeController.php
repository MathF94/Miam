<?php

namespace App\Http\Controllers;

use App\Models\Receipe;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ReceipeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function create(): View
    {
        return view('receipe.form');
    }

    /**
     * Show the form for creating a new resource.
     * 
     */
    public function store(Request $request): RedirectResponse
    {
        $user = auth()->user();
        
        // $request->validate([
        //     'user_id' => ['required', 'id', 'max:11'],
        //     'file' => ['required', 'string', 'email', 'max:255'],
        //     'receipe_name' => ['required', 'string', 'max:255'],
        //     'time_cook' => ['required', 'id', 'max:11'],
        //     'ingredients' => ['required', 'string', 'max:255'],
        //     'description' => ['required', 'string', 'max:255'],
        // ]);

        // @todo : vérifier la validation

        $receipe = Receipe::create([
            'user_id' => $user->id,
            'file' => $request-> file,
            'receipe_name' => $request-> receipe_name,
            'time_cook' => $request-> time_cook,
            'ingredients' => $request-> ingredients,
            'description'  => $request-> description,
        ]);

        // @todo : traitement du fichier (file storage voir vidéo)
        // @todo : rediriger vers la page des recettes (home)
        // @todo : sur home, lister les requêtes que j'ai en base
        
        event(new Registered($receipe));

        return redirect(RouteServiceProvider::HOME);
    }

    
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
