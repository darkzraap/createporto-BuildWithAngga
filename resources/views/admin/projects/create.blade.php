<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-bold text-gray-800 leading-tight text-4xl tracking-wide">
            {{ __('Add New Project') }}
        </h2>
    </x-slot>

    <div class="flex justify-center mt-10">
        <div class="w-[50rem] h-max rounded-2xl bg-white shadow-xl">
            <div class="p-10 text-gray-900">

                <form action="{{ route('admin.projects.store') }}" enctype="multipart/form-data" method="POST" class="flex flex-col gap-y-8">
                    @csrf
                    
                    <!-- Project Name -->
                    <div class="flex flex-col gap-y-2">
                        <label for="name" class="text-gray-700 font-medium">Project Name</label>
                        <input type="text" id="name" name="name" 
                            value="{{ old('name') }}"
                            class="w-full px-4 py-2 rounded-lg border @error('name') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                            placeholder="Masukkan nama project">

                        @error('name')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Category -->
                    <div class="flex flex-col gap-y-2">
                        <label for="category" class="text-gray-700 font-medium">Category</label>
                        <select id="category" name="category" 
                            class="w-full px-4 py-2 rounded-lg border @error('category') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            <option value="" disabled selected>Select Category</option>
                            <option value="Website Development" {{ old('category')=='Website Development'?'selected':'' }}>Website Development</option>
                            <option value="Mobile Development" {{ old('category')=='Mobile Development'?'selected':'' }}>Mobile Development</option>
                            <option value="Ui/ux design" {{ old('category')=='Ui/ux design'?'selected':'' }}>Ui/ux design</option>
                        </select>

                        @error('category')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Cover Image -->
                    <div class="flex flex-col gap-y-3">
                        <label for="cover" class="text-gray-700 font-medium">Cover Image</label>
                        <label for="cover" 
                            class="flex items-center justify-center px-6 py-3 bg-indigo-600 text-white rounded-lg cursor-pointer hover:bg-indigo-700 transition">
                            Pilih Gambar
                        </label>
                        <input type="file" id="cover" name="cover" class="hidden">
                        <p class="text-sm text-gray-500">Format: JPG, PNG | Max: 2MB</p>

                        @error('cover')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- About -->
                    <div class="flex flex-col gap-y-2">
                        <label for="about" class="text-gray-700 font-medium">About</label>
                        <textarea id="about" name="about" rows="6" 
                            class="w-full px-4 py-2 rounded-lg border @error('about') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-indigo-500"
                            placeholder="Ceritakan tentang projectmu...">{{ old('about') }}</textarea>

                        @error('about')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <button type="submit" 
                            class="mt-6 w-[12rem] py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition">
                            Upload Project
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
