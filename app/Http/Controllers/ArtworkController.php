<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ArtworkController extends Controller
{
    public function index() {
    $artworks = Artwork::orderBy('created_at', 'desc')->paginate(10);

    return view('pages.artworks', ['artworks'=>$artworks]);
    }

    public function admin_index() {
        $artworks = Artwork::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.admin-artworks', ['artworks'=>$artworks]);
    }

   public function create()
    {
        return view('create.create-artwork');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'source' => 'required|image',
            'creation_date' => 'required|date',
        ]);

        if ($request->tags) {
            $validated['tags'] = array_map('trim', explode(',', $request->tags));
        }

        if ($request->hasFile('source')) {
            $validated['source'] = $request->file('source')->store('images', 'public');
        }

        Artwork::create($validated);

        return redirect()->route('artworks.index')
            ->with('success', 'Artwork created successfully!');
    }

    public function edit($id)
    {
        $artwork = Artwork::findOrFail($id);
        return view('create.edit-artwork', compact('artwork'));
    }
    
    public function update(Request $request, Artwork $artwork)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'tags' => 'nullable|string',
            'source' => 'nullable|image',
            'creation_date' => 'date',
        ]);
    
        if ($request->tags) {
            $validated['tags'] = array_map('trim', explode(',', $request->tags));
        }

        if ($request->hasFile('source')) {
            if ($artwork->source) {
                Storage::disk('public')->delete($artwork->source);
            }
            $validated['source'] = $request->file('source')->store('images', 'public');
        }

        $artwork->update($validated);

        return redirect()->route('artworks.index')
            ->with('success', 'Artwork updated successfully!');
    }

    public function destroy($id)
    {
        $artwork = Artwork::findOrFail($id);
        
        if ($artwork->image) {
            Storage::disk('public')->delete($artwork->image);
        }

        $artwork->delete();

        return redirect()->route('artworks.index')
            ->with('success', 'Artwork deleted successfully!');
    }
}
