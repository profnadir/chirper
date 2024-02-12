<?php

namespace App\Http\Controllers;

use App\Models\Chirp;
use Illuminate\Http\Request;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$chirps = Chirp::all();
        //$chirps = $request->user()->chirps;

        $chirps = Chirp::with('user')->latest()->get();
        
        return view('chirps.index',compact('chirps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return 'form creation';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         // validation 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
            'description' => 'required|string|max:255',
        ]);

        // save dans la BD
        $request->user()->chirps()->create($validated);//
 
        // redirection
        return redirect(route('chirps.index'));

    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        return view('chirps.show',[
            'chirp' => $chirp
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        $this->authorize('update', $chirp);
 
        return view('chirps.edit', [
            'chirp' => $chirp,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Chirp $chirp)
    {
        $this->authorize('update', $chirp);
 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $chirp->update($validated);
 
        return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Chirp $chirp)
    {
        $this->authorize('delete', $chirp);

        $chirp->delete();
 
        return redirect(route('chirps.index'));
    }
}
