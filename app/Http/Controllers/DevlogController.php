<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Devlog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Purifier;

class DevlogController extends Controller
{
    public function index() {
    $devlogs = Devlog::orderBy('id', 'desc')->paginate(10);

    return view('pages.devlogs', ['devlogs'=>$devlogs]);
    }

    public function show($id){
    $devlog = Devlog::findOrFail($id);

    return view('pages.devlog', ["devlog" => $devlog]);
    }

    public function admin_index() {
    $devlogs = Devlog::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.admin-devlogs', ['devlogs'=>$devlogs]);
    }

   public function create()
    {
        return view('create.create-devlog');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'image' => 'required|image|max:2048',
            'tags' => 'nullable|string',
            'content' => 'required|string',
            'creation_date'=> 'nullable|date',
            'read_time'=>'nullable|string'
        ]);

        if ($request->tags) {
            $validated['tags'] = array_map('trim', explode(',', $request->tags));
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        // Debug: Log what Quill is sending
        Log::info('Quill Content (first 500 chars):', ['content' => substr($validated['content'], 0, 2000)]);

        $config = [
            'HTML.Allowed' => 'p[class],br,strong,em,u,s,h1,h2,h3,h4,h5,h6,blockquote,code,pre[class|spellcheck],ol[class],ul[class],li[class],a[href|target|title|class],img[src|alt|width|height|title|class],iframe[src|width|height|allowfullscreen],video[class],source[src|type],div[class|spellcheck],span[class]',
            'HTML.SafeIframe' => true,
            'URI.SafeIframeRegexp' => '%^(?:https?:)?//(?:www\.)?(?:youtube(?:-nocookie)?\.com/embed/|vimeo\.com/video/)%',
            'URI.AllowedSchemes' => ['http' => true, 'https' => true, 'data' => true],
            'Attr.AllowedFrameTargets' => ['_blank', '_self'],
            'Attr.AllowedClasses' => [
                'ql-code-block-container', 'ql-code-block', 'ql-syntax',
                'ql-align-center', 'ql-align-right', 'ql-align-justify', 'ql-align-left',
                'ql-indent-1', 'ql-indent-2', 'ql-indent-3', 'ql-indent-4', 'ql-indent-5', 'ql-indent-6', 'ql-indent-7', 'ql-indent-8',
                'ql-direction-rtl',
                'ql-size-small', 'ql-size-large', 'ql-size-huge',
                'ql-font-serif', 'ql-font-monospace',
                'ql-video',
            ],
        ];
        $validated['content'] = app('purifier')->clean($validated['content'], $config);

        // Debug: Log what was stored after purifying
        Log::info('Purified Content (first 500 chars):', ['content' => substr($validated['content'], 0, 2000)]);

        if (!isset($validated['creation_date'])) {
            $validated['creation_date'] = now();
        }

        Devlog::create($validated);

        return redirect()->route('devlogs.index')
            ->with('success', 'Devlog added successfully!');
    }

    public function edit($id)
    {
        $devlog = Devlog::findOrFail($id);
        return view('create.edit-devlog', compact('devlog'));
    }
    
    public function update(Request $request, Devlog $devlog)
    {
        $validated = $request->validate([
            'title' => 'string|max:255',
            'description' => 'string|max:255',
            'image' => 'image|max:2048',
            'tags' => 'nullable|string',
            'content' => 'string|max:9999',
            'creation_date'=> 'nullable|date',
            'read_time'=>'nullable|string'
        ]);

        if ($request->hasFile('image')) {
            if ($devlog->image) {
                Storage::disk('public')->delete($devlog->image);
            }
            $validated['image'] = $request->file('image')->store('images', 'public');
        }

        if (isset($validated['content'])) {
            $config = [
                'HTML.Allowed' => 'p[class],br,strong,em,u,s,h1,h2,h3,h4,h5,h6,blockquote,code,pre[class|spellcheck],ol[class],ul[class],li[class],a[href|target|title|class],img[src|alt|width|height|title|class],iframe[src|width|height|allowfullscreen],video[class],source[src|type],div[class|spellcheck],span[class]',
                'HTML.SafeIframe' => true,
                'URI.SafeIframeRegexp' => '%^(?:https?:)?//(?:www\.)?(?:youtube(?:-nocookie)?\.com/embed/|vimeo\.com/video/)%',
                'URI.AllowedSchemes' => ['http' => true, 'https' => true, 'data' => true],
                'Attr.AllowedFrameTargets' => ['_blank', '_self'],
                'Attr.AllowedClasses' => [
                    'ql-code-block-container', 'ql-code-block', 'ql-syntax',
                    'ql-align-center', 'ql-align-right', 'ql-align-justify', 'ql-align-left',
                    'ql-indent-1', 'ql-indent-2', 'ql-indent-3', 'ql-indent-4', 'ql-indent-5', 'ql-indent-6', 'ql-indent-7', 'ql-indent-8',
                    'ql-direction-rtl',
                    'ql-size-small', 'ql-size-large', 'ql-size-huge',
                    'ql-font-serif', 'ql-font-monospace',
                    'ql-video',
                ],
            ];
            $validated['content'] = app('purifier')->clean($validated['content'], $config);
        }

        if (!isset($validated['creation_date'])) {
            $validated['creation_date'] = now();
        }

        $devlog->update($validated);

        return redirect()->route('devlogs.index')
            ->with('success', 'Devlog updated successfully!');
    }

    public function destroy($id)
    {
        $devlog = Devlog::findOrFail($id);
        
        if ($devlog->image) {
            Storage::disk('public')->delete($devlog->image);
        }

        $devlog->delete();

        return redirect()->route('devlogs.index')
            ->with('success', 'Devlog deleted successfully!');
    }
}
