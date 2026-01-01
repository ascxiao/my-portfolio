@extends('dashboard')

@section('title', 'Add Devlog')

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
@section('content')
<div class="flex flex-col md:flex-row justify-around bg-white overflow-hidden shadow-sm sm:rounded-lg py-4 px-8 gap-4">
    <div id='forms' class="p-2 lg:p-6 w-full md:w-1/2 flex-shrink-0">
        <h2 class="text-2xl font-bold mb-6">Add New Devlog</h2>

        <form action="{{ route('devlogs.store') }}" method="POST" enctype="multipart/form-data" id="devlogForm">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Upload Cover Photo *</label>
                <input type="file" name="image" id="image" accept="image/*" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                <!-- Image Preview -->
                <div class="mt-3" id="image-preview-container" style="display: none;">
                    <img id="preview-image" src="" alt="Preview" class="max-w-xs rounded-md border border-gray-300">
                </div>
            </div>
            
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                <textarea name="description" id="description" required rows="6"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500">{{ old('description') }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags (comma-separated)</label>
                <input type="text" name="tags" id="tags" value="{{ old('tags') }}" placeholder="Project Management, UI/UX, Game"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500">
                <p class="text-xs text-gray-500 mt-1">Separate tags with commas</p>
                @error('tags')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="read_time" class="block text-sm font-medium text-gray-700 mb-2">Estimated Read Time (in minutes)*</label>
                <input type="text" name="read_time" id="read_time" value="{{ old('read_time') }}" required pattern="[0-9]+" inputmode="numeric"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-green-500 focus:border-green-500"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
                @error('read_time')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md">
                    Create Devlog
                </button>
                <a href="{{ route('devlogs.index') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
            </div>

            <input type="hidden" name="content" id="content">
        </form>
    </div>

    <div id='editor-container' class="p-6 w-full md:w-1/2 flex-shrink-0">
        <div class="mb-6 w-full">
            <label class="block text-xs md:text-sm font-medium text-gray-700 mb-2">Content *</label>
            <div id="editor-wrapper" class="bg-white border border-gray-300 rounded-md" style="max-width: 100%; height: 600px; display: flex; flex-direction: column;">
                <div id="editor" style="flex: 1; display: flex; flex-direction: column; overflow: hidden;" class="px-6">
                    {!! old('content') !!}
                </div>
            </div>
            <style>
                #editor .ql-toolbar {
                    flex-shrink: 0;
                }
                #editor .ql-container {
                    flex: 1;
                    overflow-y: auto;
                }
                #editor .ql-editor {
                    height: 100%;
                }
                #editor img {
                    max-width: 100% !important;
                    height: auto !important;
                }
                #editor .ql-editor * {
                    max-width: 100%;
                }
            </style>
            @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
            <p class="text-xs text-gray-500 mt-1">Write your devlog content here with rich text formatting</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
<script>
    // Initialize Quill editor
    const quill = new Quill('#editor', {
        theme: 'snow',
        modules: {
            toolbar: [
                [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
                ['bold', 'italic', 'underline', 'strike'],
                [{ 'color': [] }, { 'background': [] }],
                [{ 'list': 'ordered'}, { 'list': 'bullet' }],
                [{ 'indent': '-1'}, { 'indent': '+1' }],
                [{ 'align': [] }],
                ['blockquote', 'code-block'],
                ['link', 'image', 'video'],
                ['clean']
            ]
        },
        placeholder: 'Write your devlog content here...'
    });

    // Image preview functionality
    document.getElementById('image').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('preview-image').src = e.target.result;
                document.getElementById('image-preview-container').style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    });

    document.getElementById('devlogForm').addEventListener('submit', function(e) {
        const content = quill.root.innerHTML;
        
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = content;
        const textContent = tempDiv.textContent.trim();
        
        if (!textContent) {
            e.preventDefault();
            alert('Please add some content to your devlog.');
            return false;
        }
        
        document.getElementById('content').value = content;
    });

    // Auto-save to localStorage every 30 seconds
    let autoSaveInterval = setInterval(function() {
        const content = quill.root.innerHTML;
        const title = document.getElementById('title').value;
        const description = document.getElementById('description').value;
        
        if (content || title || description) {
            localStorage.setItem('devlog_draft', JSON.stringify({
                title: title,
                description: description,
                content: content,
                tags: document.getElementById('tags').value,
                timestamp: new Date().toISOString()
            }));
            
            console.log('Draft auto-saved at ' + new Date().toLocaleTimeString());
        }
    }, 30000); // Every 30 seconds

    // Load draft on page load
    window.addEventListener('load', function() {
        const draft = localStorage.getItem('devlog_draft');
        if (draft) {
            const data = JSON.parse(draft);
            const loadDraft = confirm('A draft was found from ' + new Date(data.timestamp).toLocaleString() + '. Would you like to restore it?');
            
            if (loadDraft) {
                document.getElementById('title').value = data.title;
                document.getElementById('description').value = data.description;
                document.getElementById('tags').value = data.tags;
                quill.root.innerHTML = data.content;
            }
        }
    });

    // Clear draft after successful submission
    document.getElementById('devlogForm').addEventListener('submit', function() {
        if (this.checkValidity()) {
            localStorage.removeItem('devlog_draft');
        }
    });
</script>
@endsection