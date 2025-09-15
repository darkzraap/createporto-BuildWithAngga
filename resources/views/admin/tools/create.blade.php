<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-bold text-gray-800 leading-tight text-4xl tracking-wide">
            {{ __('Add New Tools') }}
        </h2>
    </x-slot>

    <div class="flex justify-center mt-10">
        <div class="w-[50rem] h-max rounded-2xl bg-white shadow-xl">
            <div class="p-10 text-gray-900">

                <form action="{{ route('admin.tools.store') }}" enctype="multipart/form-data" method="POST" class="flex flex-col gap-y-8">
                    @csrf
                    
                    <!-- Project Name -->
                    <div class="flex flex-col gap-y-2">
                        <label for="name" class="text-gray-700 font-medium">Tools Name</label>
                        <input type="text" id="name" name="name" 
                            value="{{ old('name') }}"
                            class="w-full px-4 py-2 rounded-lg border @error('name') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                            placeholder="Masukkan nama tools">

                        @error('name')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <!-- Tagline -->
                     <div class="flex flex-col gap-y-2">
                        <label for="name" class="text-gray-700 font-medium">Tagline</label>
                        <input type="text" id="tagline" name="tagline" 
                            value="{{ old('name') }}"
                            class="w-full px-4 py-2 rounded-lg border @error('tagline') border-red-500 @else border-gray-300 @enderror focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                            placeholder="Masukkan Tagline">

                        @error('tagline')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Cover Image -->
                    <div class="flex flex-col gap-y-3">
                        <label for="logo" class="text-gray-700 font-medium">Logo</label>
                        <label for="logo" 
                            class="flex items-center justify-center px-6 py-3 bg-indigo-600 text-white rounded-lg cursor-pointer hover:bg-indigo-700 transition">
                            Pilih Logo
                        </label>
                        <input type="file" id="logo" name="logo" class="hidden">
                        <p class="text-sm text-gray-500">Format: JPG, PNG | Max: 2MB</p>

                        @error('logo')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

    

                    <!-- Submit Button -->
                    <div class="flex justify-center">
                        <button type="submit" 
                            class="mt-6 w-[12rem] py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition">
                            Upload Tools
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</x-app-layout>
