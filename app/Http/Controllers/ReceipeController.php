<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Receipe;
use App\Models\Image;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\UploadedFile;

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


    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'user_id' => 'nullable', 'id', 'max:11',
            'file' => 'required', 'string', 'email', 'max:255',
            'receipe_name' => 'required', 'string', 'max:255',
            'time_cook' => 'required', 'id', 'max:11',
            'ingredients' => 'required', 'string', 'max:255',
            'description' => 'required', 'string', 'max:255',
        ]);

        $filename = time() . '.' . $request->file->extension();

        $path = $request->file('file')->storeAs(
            'images',
            $filename,
            'public'
        );

        $receipe = Receipe::create([
            'user_id' => $user->id,
            'file' => $request->file,
            'receipe_name' => $request->receipe_name,
            'time_cook' => $request->time_cook,
            'ingredients' => $request->ingredients,
            'description'  => $request->description,
        ]);

        /* $image = new Image();
        $image->path = $path;

        $receipe->file->save($image); */

        $request->file->move(public_path('images'));

        dd('Recette créée !');
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
