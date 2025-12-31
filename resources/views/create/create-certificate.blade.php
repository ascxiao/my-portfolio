@extends('dashboard')

@section('title', 'Add Certificate')

@section('content')
<div class="flex flex-col md:flex-row justify-around bg-white overflow-hidden shadow-sm sm:rounded-lg py-4 px-8">
    <div class="flex items-center w-128 h-96 lg:h-128 aspect-video md:p-16">
        <img id="preview-image" src="/images/placeholder.jpeg" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
    </div>

    <div class="p-6">
        <h2 class="text-2xl font-bold mb-6">Add New Certificate</h2>

        <form action="{{ route('certificates.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mb-4">
                <label for="provider" class="block text-sm font-medium text-gray-700 mb-2">Provider *</label>
                <input type="text" name="provider" id="provider" value="{{ old('title') }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>  
            
            <div class="mb-4">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                <textarea name="description" id="description" required rows="6"
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">{{ old('description') }}</textarea>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Upload Image</label>
                <input type="file" name="image" id="image" accept="image/*" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mb-4">
                <label for="acquired_date" class="block text-sm font-medium text-gray-700 mb-2">Acquired Date *</label>
                <input type="date" name="acquired_date" id="acquired_date" value="{{ old('acquired_date', now()->format('Y-m-d')) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="mb-4">
                <label for="link" class="block text-sm font-medium text-gray-700 mb-2">External Link *</label>
                <input type="url" name="link" id="link" value="{{ old('link') }}" placeholder="https://example.com" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <div class="flex items-center gap-4">
                <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-md">
                    Create Project
                </button>
                <a href="{{ route('certificates.index') }}" class="text-gray-600 hover:text-gray-900">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('image').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('preview-image').src = e.target.result;
        };
        reader.readAsDataURL(file);
    }
});
</script>
@endsection