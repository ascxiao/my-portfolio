<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Certification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CertificationController extends Controller
{
    public function index() {
    $certifications = Certification::orderBy('created_at', 'desc')->paginate(10);

        return view('pages.certification', ['certifications'=>$certifications]);
    }

    public function admin_index() {
    $certifications = Certification::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.admin-certificates', ['certifications'=>$certifications]);
    }

   public function create()
    {
        return view('create.create-certificate');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'provider' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'acquired_date'=> 'required|date',
            'link' => 'required|url',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 's3');
        }

        Certification::create($validated);

        return redirect()->route('certificates.index')
            ->with('success', 'Certificate added successfully!');
    }

    public function edit($id)
    {
        $certificate = Certification::findOrFail($id);
        return view('create.edit-certificate', compact('certificate'));
    }
    
    public function update(Request $request, Certification $certificate)
    {
        $validated = $request->validate([
            'title' => '|string|max:255',
            'provider' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'image|max:2048',
            'acquired_date'=> 'date',
            'link' => 'required|url',
        ]);

        if ($request->hasFile('image')) {
            if ($certificate->image) {
                Storage::disk('s3')->delete($certificate->image);
            }
            $validated['image'] = $request->file('image')->store('images', 's3');
        }

        $certificate->update($validated);

        return redirect()->route('certificates.index')
            ->with('success', 'Certificate updated successfully!');
    }

    public function destroy($id)
    {
        $certificate = Certification::findOrFail($id);
        
        if ($certificate->image) {
            Storage::disk('s3')->delete($certificate->image);
        }

        $certificate->delete();

        return redirect()->route('certificates.index')
            ->with('success', 'Certificate deleted successfully!');
    }
}
