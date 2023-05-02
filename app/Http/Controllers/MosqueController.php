<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mosque;

class MosqueController extends Controller
{
    public function index()
    {
        $mosque = Mosque::all();
        return view('mosques.index', ['mosque' => $mosque]);
    }

    public function create()
    {
        return view('mosques.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_mosque' => 'required',
            'address_mosque' => 'required'
        ]);

        $data = $request->except('_token');

        Mosque::create($data);
        

        return redirect()->route('mosque');
    }

    public function edit($id)
    {
        $mosque = Mosque::find($id);

        return view('mosques.edit', compact('mosque'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name_mosque' => 'required',
            'address_mosque' => 'required'
        ]);

        // Get the Mosque by ID
        $mosque = Mosque::find($id);

        // Update the Mosque properties
        $mosque->name_mosque = $request->name_mosque;
        $mosque->address_mosque = $request->address_mosque;

        $mosque->save();

        // Redirect back to the mosque list page
        return redirect()->route('mosque');
    }

    public function destroy()
    {
        //
    }
}
