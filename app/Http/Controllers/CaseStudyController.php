<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Mews\Purifier\Purifier;

class CaseStudyController extends Controller
{
    public function index() {
    $cases = CaseStudy::orderBy('created_at', 'desc')->paginate(9);

    return view('pages.case_study', ['cases'=>$cases]);
    }

    public function show($id){
    $case = CaseStudy::findOrFail($id);

    return view('pages.case', ["case" => $case]);
    }

    public function admin_index() {
    $cases = CaseStudy::orderBy('created_at', 'desc')->paginate(15);

        return view('admin.admin-cases', ['cases'=>$cases]);
    }

   public function create()
    {
        return view('create.create-case');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image',
            'tags' => 'required|string',
            'metrics' => 'required|array|min:1',
            'content' => 'required|string',
            'date'=> 'required|date',
            'duration'=>'nullable|string',
            'role'=>'required|string',
            'team'=>'required|string',
            'metrics.*.metrics' => 'required|string|max:255',
            'metrics.*.quantifier' => 'required|string|max:255'
        ]);

        if ($request->tags) {
            $validated['tags'] = array_map('trim', explode(',', $request->tags));
        }

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('images', 's3');
        }

        $config = [
            'HTML.Allowed' => 'p[class],br,strong,em,u,s,h1,h2,h3,h4,h5,h6,blockquote,code,pre[class],ol[class],ul[class],li[class],a[href|target|title|class],img[src|alt|width|height|title|class],iframe[src|width|height|allowfullscreen],video[class],source[src|type],div[class],span[class]',
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

        if (!isset($validated['date'])) {
            $validated['date'] = now();
        }

        CaseStudy::create($validated);

        return redirect()->route('cases.index')
            ->with('success', 'Case Study added successfully!');
    }

    public function edit($id)
    {
        $case = CaseStudy::findOrFail($id);
        return view('create.edit-case', compact('case'));
    }
    
    public function update(Request $request, CaseStudy $case)
    {
        $validated = $request->validate([
            'title' => 'string|max:255',
            'description' => 'string',
            'image' => 'image',
            'tags' => 'string',
            'metrics' => 'array|min:1',
            'content' => 'string',
            'date'=> 'date',
            'duration'=>'nullable|string',
            'role'=>'string',
            'team'=>'string',
            'metrics.*.metrics' => 'string|max:255',
            'metrics.*.quantifier' => 'string|max:255'
        ]);

        if ($request->hasFile('image')) {
            if ($case->image) {
                Storage::disk('s3')->delete($case->image);
            }
            $validated['image'] = $request->file('image')->store('images', 's3');
        }

        if (isset($validated['content'])) {
            $config = [
                'HTML.Allowed' => 'p[class],br,strong,em,u,s,h1,h2,h3,h4,h5,h6,blockquote,code,pre[class],ol[class],ul[class],li[class],a[href|target|title|class],img[src|alt|width|height|title|class],iframe[src|width|height|allowfullscreen],video[class],source[src|type],div[class],span[class]',
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

        if ($request->tags) {
            $validated['tags'] = array_map('trim', explode(',', $request->tags));
        }

        $case->update($validated);

        return redirect()->route('cases.index')
            ->with('success', 'Case Study updated successfully!');
    }

    public function destroy($id)
    {
        $case = CaseStudy::findOrFail($id);
        
        if ($case->image) {
            Storage::disk('s3')->delete($case->image);
        }

        $case->delete();

        return redirect()->route('cases.index')
            ->with('success', 'Case Study deleted successfully!');
    }

}
