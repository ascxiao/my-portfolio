<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Artwork;
use Illuminate\Http\Request;

class ArtworkController extends Controller
{
    public function index() {
    $artworks = Artwork::orderBy('created_at', 'desc')->paginate(10);

    return view('pages.artworks', ['artworks'=>$artworks]);
    }
}
