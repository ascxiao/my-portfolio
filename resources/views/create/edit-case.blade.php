@extends('dashboard')

@section('title', 'Edit Case Study')

<link href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" rel="stylesheet">
@section('content')
<div class="flex flex-col md:flex-row justify-around bg-white overflow-hidden shadow-sm sm:rounded-lg py-4 px-8 gap-4">
    <div id='forms' class="p-2 lg:p-6 w-full md:w-1/2 flex-shrink-0">
        <h2 class="text-2xl font-bold mb-6">Edit Case Study</h2>

        <form action="{{ route('cases.update', $case->id) }}" method="POST" enctype="multipart/form-data" id="caseForm">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                <input type="text" name="title" id="title" value="{{ $case->title }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Upload Cover Photo *</label>
                <input type="file" name="image" id="image" accept="image/*"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @error('image')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror

                <!-- Image Preview -->
                <div class="mt-3" id="image-preview-container" style="display: none;">
                    <img id="preview-image" src='{{asset('storage/'.$case->image)}}' alt="Preview" class="max-w-xs rounded-md border border-gray-300">
                    <p class="text-xs text-gray-500 mt-1">Current: {{ basename($case->image) }}</p>
                </div>
            </div>
            
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                <textarea name="description" id="description" rows="6"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ $case->description }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="tags" class="block text-sm font-medium text-gray-700 mb-2">Tags (comma-separated)</label>
                <input type="text" name="tags" id="tags" value="{{ old('tags', $case->tags ? implode(', ', $case->tags) : '') }}" placeholder="Project Management, UI/UX, Game"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                <p class="text-xs text-gray-500 mt-1">Separate tags with commas</p>
                @error('tags')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="date" class="block text-sm font-medium text-gray-700 mb-2">Date *</label>
                <input type="date" name="date" id="date" value="{{ $case->date ? $case->date->format('Y-m-d') : '' }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mb-4">
                <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">Duration (in weeks) *</label>
                <input type="text" name="duration" id="duration" value="{{ $case->duration }}" pattern="[0-9]+" inputmode="numeric"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500"
                    oninput="this.value = this.value.replace(/[^0-9]/g, '')">
            </div>

            <div class="mb-4">
                <label for="role" class="block text-sm font-medium text-gray-700 mb-2">Role *</label>
                <input type="text" name="role" id="role" value="{{ $case->role }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @error('role')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="team" class="block text-sm font-medium text-gray-700 mb-2">Team *</label>
                <input type="text" name="team" id="team" value="{{ $case->team }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
                @error('team')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div id="metrics-container" class="space-y-4">
                <label for="duration" class="block text-sm font-medium text-gray-700 mb-2">Metrics</label>
                @php
                    $existingMetrics = old('metrics', $case->metrics ?? []);
                    $existingMetrics = is_array($existingMetrics) && count($existingMetrics) > 0 ? $existingMetrics : [[]];
                @endphp
                @foreach($existingMetrics as $index => $metric)
                <div class="metric-group p-4 bg-white border border-gray-200 rounded-lg shadow-sm" data-index="{{ $index }}">
                    <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                        <div class="md:col-span-5">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Metric</label>
                            <input type="text" 
                                name="metrics[{{ $index }}][metrics]" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                placeholder="e.g., User Engagement, Conversion Rate"
                                value="{{ old('metrics.'.$index.'.metrics', $metric['metrics'] ?? '') }}">
                            @error('metrics.'.$index.'.metrics')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="md:col-span-5">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Value</label>
                            <input type="text" 
                                name="metrics[{{ $index }}][quantifier]" 
                                class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                                placeholder="e.g., 50%, 2x, 100 increase"
                                value="{{ old('metrics.'.$index.'.quantifier', $metric['quantifier'] ?? '') }}">
                            @error('metrics.'.$index.'.quantifier')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <div class="md:col-span-2 flex items-end">
                            <button type="button" 
                                    class="remove-metric w-full px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition disabled:opacity-50 disabled:cursor-not-allowed" 
                                    disabled>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        
            <button type="button" 
                    id="add-metric" 
                    class="my-4 px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 transition">
                + Add Metric
            </button>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md">
                    Create Case Study
                </button>
                <a href="{{ route('cases.index') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
            </div>

            <input type="hidden" name="content" id="content">
        </form>
    </div>

    <div id='editor-container' class="p-6 w-full md:w-1/2 flex-shrink-0">
        <div class="mb-6 w-full">
            <label class="block text-xs md:text-sm font-medium text-gray-700 mb-2">Content *</label>
            <div id="editor-wrapper" class="bg-white border border-gray-300 rounded-md" style="max-width: 100%; height: 600px; display: flex; flex-direction: column;">
                <div id="editor" style="flex: 1; display: flex; flex-direction: column; overflow: hidden;" class="px-6">
                    {!! $case->content !!}
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
            <p class="text-xs text-gray-500 mt-1">Write your case study content here with rich text formatting</p>
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
        placeholder: 'Write your case study here...'
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

    document.getElementById('caseForm').addEventListener('submit', function(e) {
        const content = quill.root.innerHTML;
        
        const tempDiv = document.createElement('div');
        tempDiv.innerHTML = content;
        const textContent = tempDiv.textContent.trim();
        
        if (!textContent) {
            e.preventDefault();
            alert('Please add some content to your case study.');
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
            localStorage.setItem('case_draft', JSON.stringify({
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
        const draft = localStorage.getItem('case_draft');
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

    window.addEventListener('load', function() {
        // Clean old generic key to avoid unexpected prompts
        localStorage.removeItem('case_draft');

        const draft = localStorage.getItem(draftKey);
        if (draft) {
            const data = JSON.parse(draft);
            document.getElementById('title').value = data.title;
            document.getElementById('description').value = data.description;
            document.getElementById('tags').value = data.tags;
            quill.root.innerHTML = data.content;
        }
    });

    // Clear draft after successful submission
    document.getElementById('caseForm').addEventListener('submit', function() {
        if (this.checkValidity()) {
            localStorage.removeItem('case_draft');
        }
    });
</script>

<script>
let metricIndex = {{ count($existingMetrics ?? []) }};

document.getElementById('add-metric').addEventListener('click', function() {
    const container = document.getElementById('metrics-container');
    const newGroup = document.createElement('div');
    newGroup.className = 'metric-group p-4 bg-white border border-gray-200 rounded-lg shadow-sm';
    newGroup.setAttribute('data-index', metricIndex);
    
    newGroup.innerHTML = `
            <div class="grid grid-cols-1 md:grid-cols-12 gap-4">
                <div class="md:col-span-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Metric</label>
                    <input type="text" 
                        name="metrics[${metricIndex}][metrics]" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                        placeholder="e.g., User Engagement, Conversion Rate"
                        value="{{ old('metrics.${metricIndex}.metric') }}">
                    @error('metrics.${metricIndex}.metric')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="md:col-span-5">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Value</label>
                    <input type="text" 
                        name="metrics[${metricIndex}][quantifier]" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" 
                        placeholder="e.g., 50%, 2x, 100 increase"
                        value="{{ old('metrics.${metricIndex}.quantifier') }}">
                    @error('metrics.${metricIndex}.quantifier')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
                
                <div class="md:col-span-2 flex items-end">
                    <button type="button" 
                            class="remove-metric w-full px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 transition disabled:opacity-50 disabled:cursor-not-allowed" 
                            disabled>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                        </svg>
                    </button>
                </div>
            </div>
    `;
    
    container.appendChild(newGroup);
    metricIndex++;
    updateRemoveButtons();
});

document.getElementById('metrics-container').addEventListener('click', function(e) {
    if (e.target.classList.contains('remove-metric')) {
        e.target.closest('.metric-group').remove();
        updateRemoveButtons();
    }
});

function updateRemoveButtons() {
    const groups = document.querySelectorAll('.metric-group');
    groups.forEach((group, index) => {
        const removeBtn = group.querySelector('.remove-metric');
        if (groups.length === 1) {
            removeBtn.disabled = true;
        } else {
            removeBtn.disabled = false;
        }
    });
}
</script>
@endsection