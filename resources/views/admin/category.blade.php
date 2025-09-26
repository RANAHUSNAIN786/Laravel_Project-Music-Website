@extends('admin.adminmain')

@section('title', 'Category Management')

@section('content')
<!-- Flash Messages -->
@if(session('success'))
    <div class="mb-6 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg p-4">
        <div class="flex items-center">
            <div class="flex-shrink-0">
                <i class="fas fa-check-circle text-green-400"></i>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-green-800 dark:text-green-200">
                    {{ session('success') }}
                </p>
            </div>
            <div class="ml-auto pl-3">
                <button onclick="this.parentElement.parentElement.parentElement.remove()" class="text-green-400 hover:text-green-600">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    </div>
@endif

<!-- Page Header -->
<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-8">
    <div>
        <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Category Management</h1>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">Organize your content with categories</p>
    </div>
    <div class="mt-4 sm:mt-0">
        <button onclick="document.getElementById('addCategoryModal').classList.remove('hidden')" 
                class="inline-flex items-center px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg shadow-sm transition-colors duration-200">
            <i class="fas fa-plus mr-2"></i>
            Add New Category
        </button>
    </div>
</div>

<!-- Stats Cards -->
<div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center">
                <i class="fas fa-layer-group text-purple-600 dark:text-purple-400 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Total Categories</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $categories->count() }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center">
                <i class="fas fa-music text-blue-600 dark:text-blue-400 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Music Categories</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">--</p>
            </div>
        </div>
    </div>

    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
        <div class="flex items-center">
            <div class="w-12 h-12 bg-red-100 dark:bg-red-900/30 rounded-lg flex items-center justify-center">
                <i class="fas fa-video text-red-600 dark:text-red-400 text-xl"></i>
            </div>
            <div class="ml-4">
                <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Video Categories</p>
                <p class="text-2xl font-bold text-gray-900 dark:text-white">--</p>
            </div>
        </div>
    </div>
</div>

<!-- Categories Grid -->
<div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
    @if($categories->isEmpty())
        <!-- Empty State -->
        <div class="text-center py-16">
            <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-layer-group text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">No categories found</h3>
            <p class="text-gray-500 dark:text-gray-400 mb-8">Get started by creating your first category.</p>
            <button onclick="document.getElementById('addCategoryModal').classList.remove('hidden')" 
                    class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-medium rounded-lg transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i>
                Create Your First Category
            </button>
        </div>
    @else
        <!-- Categories Header -->
        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Categories ({{ $categories->count() }})</h3>
                <div class="flex items-center space-x-2">
                    <button onclick="setView('grid')" id="gridBtn" class="text-sm text-purple-600 dark:text-purple-400 hover:text-purple-700 dark:hover:text-purple-300">
                        <i class="fas fa-th mr-1"></i> Grid
                    </button>
                    <button onclick="setView('list')" id="listBtn" class="text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                        <i class="fas fa-list mr-1"></i> List
                    </button>
                </div>
            </div>
        </div>

        <!-- Categories Wrapper -->
        <div class="p-6">
            <div id="categoriesWrapper" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($categories as $category)
                <div class="category-card group bg-gray-50 dark:bg-gray-700/50 rounded-xl p-6 hover:bg-gray-100 dark:hover:bg-gray-700 transition-all duration-200 border border-gray-200 dark:border-gray-600 hover:border-purple-300 dark:hover:border-purple-600">
                    <!-- Category Icon -->
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-400 to-purple-600 rounded-lg flex items-center justify-center shadow-sm">
                            <i class="fas fa-tag text-white text-lg"></i>
                        </div>
                        
                        <!-- Actions Dropdown -->
                        <div class="relative opacity-0 group-hover:opacity-100 transition-opacity duration-200" x-data="{ open: false }">
                            <button @click="open = !open" 
                                    class="p-2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200">
                                <i class="fas fa-ellipsis-v"></i>
                            </button>
                            
                            <div x-show="open" 
                                 @click.away="open = false"
                                 class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-700 rounded-lg shadow-lg border border-gray-200 dark:border-gray-600 z-10"
                                 style="display: none;">
                                <div class="py-1">
                                    <button onclick="editCategory({{ $category->id }}, '{{ $category->name }}')" 
                                            class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <i class="fas fa-edit mr-2"></i>Edit
                                    </button>
                                    <button class="block w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <i class="fas fa-copy mr-2"></i>Duplicate
                                    </button>
                                    <div class="border-t border-gray-100 dark:border-gray-600"></div>
                                    <form action="{{ route('category.delete', $category->id) }}" method="POST" class="block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" 
                                                onclick="return confirm('Are you sure you want to delete this category?')"
                                                class="block w-full text-left px-4 py-2 text-sm text-red-700 dark:text-red-400 hover:bg-gray-100 dark:hover:bg-gray-600">
                                            <i class="fas fa-trash-alt mr-2"></i>Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Category Info -->
                    <div class="mb-4">
                        <h4 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                            {{ $category->name }}
                        </h4>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            -- items in this category
                        </p>
                    </div>

                    <!-- Category Stats -->
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center text-gray-500 dark:text-gray-400">
                            <i class="fas fa-calendar mr-1"></i>
                            Created {{ $category->created_at ? $category->created_at->diffForHumans() : 'recently' }}
                        </div>
                        <div class="flex items-center space-x-2">
                            <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-purple-100 dark:bg-purple-900/30 text-purple-800 dark:text-purple-300">
                                Active
                            </span>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

<!-- Add Category Modal -->
<div id="addCategoryModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-xl bg-white dark:bg-gray-800">
        <div class="mt-3">
            <!-- Modal Header -->
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Add New Category</h3>
                <button onclick="document.getElementById('addCategoryModal').classList.add('hidden')" 
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Modal Form -->
            <form action="{{ route('category.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="categoryName" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Category Name
                    </label>
                    <input type="text" 
                           id="categoryName"
                           name="name" 
                           placeholder="Enter category name" 
                           required 
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>

                <div>
                    <label for="categoryDescription" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Description (Optional)
                    </label>
                    <textarea id="categoryDescription"
                              name="description" 
                              rows="3"
                              placeholder="Enter category description" 
                              class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent"></textarea>
                </div>

                <div class="flex items-center justify-end space-x-3 pt-4">
                    <button type="button" 
                            onclick="document.getElementById('addCategoryModal').classList.add('hidden')"
                            class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 rounded-lg transition-colors duration-200">
                        <i class="fas fa-plus mr-2"></i>
                        Add Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Category Modal -->
<div id="editCategoryModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full z-50 hidden">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-xl bg-white dark:bg-gray-800">
        <div class="mt-3">
            <!-- Modal Header -->
            <div class="flex items-center justify-between mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Edit Category</h3>
                <button onclick="document.getElementById('editCategoryModal').classList.add('hidden')" 
                        class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Modal Form -->
            <form id="editCategoryForm" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label for="editCategoryName" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Category Name
                    </label>
                    <input type="text" 
                           id="editCategoryName"
                           name="name" 
                           required 
                           class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                </div>

                <div class="flex items-center justify-end space-x-3 pt-4">
                    <button type="button" 
                            onclick="document.getElementById('editCategoryModal').classList.add('hidden')"
                            class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg transition-colors duration-200">
                        Cancel
                    </button>
                    <button type="submit" 
                            class="px-4 py-2 text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 rounded-lg transition-colors duration-200">
                        <i class="fas fa-save mr-2"></i>
                        Update Category
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function editCategory(id, name) {
    document.getElementById('editCategoryForm').action = `/admin/category/${id}`;
    document.getElementById('editCategoryName').value = name;
    document.getElementById('editCategoryModal').classList.remove('hidden');
}

// ✅ Grid/List Toggle
function setView(view) {
    const wrapper = document.getElementById('categoriesWrapper');
    const gridBtn = document.getElementById('gridBtn');
    const listBtn = document.getElementById('listBtn');

    if (view === 'grid') {
        wrapper.classList.remove('flex', 'flex-col', 'space-y-4');
        wrapper.classList.add('grid','grid-cols-1','md:grid-cols-2','lg:grid-cols-3','xl:grid-cols-4','gap-6');
        gridBtn.classList.add('text-purple-600','dark:text-purple-400');
        gridBtn.classList.remove('text-gray-500','dark:text-gray-400');
        listBtn.classList.remove('text-purple-600','dark:text-purple-400');
        listBtn.classList.add('text-gray-500','dark:text-gray-400');
    } else {
        wrapper.classList.remove('grid','grid-cols-1','md:grid-cols-2','lg:grid-cols-3','xl:grid-cols-4','gap-6');
        wrapper.classList.add('flex','flex-col','space-y-4');
        listBtn.classList.add('text-purple-600','dark:text-purple-400');
        listBtn.classList.remove('text-gray-500','dark:text-gray-400');
        gridBtn.classList.remove('text-purple-600','dark:text-purple-400');
        gridBtn.classList.add('text-gray-500','dark:text-gray-400');
    }
}
</script>
@endsection
