<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight text-[50px]">
            {{ __('MY PROJECTS') }}
        </h2>
        <div class="flex justify-end mt-4">
            <a href="{{ route('admin.projects.create') }}" 
               class="bg-black text-white text-xl px-4 py-2 rounded-xl hover:bg-gray-800 transition">
                + Add New Project
            </a>
        </div>
    </x-slot>


    <div class="border mt-6"> 
        @forelse($projects as $project)

        <!-- Card Project -->
        <div class="hover:bg-gray-300 flex flex-row items-center justify-between p-6 bg-white rounded-xl shadow-md gap-8">
            
            <!-- Gambar -->
            <div class="flex-shrink-0">
                <img src="{{Storage::url($project->cover)}}" 
                     alt="Project Thumbnail" 
                     class="w-40 h-24 rounded-lg object-cover">
            </div>

            <!-- Info Project -->
            <div class="flex flex-col flex-grow">
                <p class="font-semibold text-lg text-gray-800">{{ $project->name ?? 'Project Name' }}</p>
                <p class="text-gray-500 text-sm">{{ $project->category ?? 'Website Development' }}</p>
            </div>

            <!-- Tombol Tambahan -->
            <div class="flex flex-row items-center gap-2">
                <a href="{{route('admin.screenshots.assign.project', $project)}}" class="bg-black text-white text-xs px-4 py-2 rounded-xl hover:bg-gray-800 transition">+ Add Screenshot</a>
                <a href="{{route('admin.project.assign.tool', $project)}}" class="bg-black text-white text-xs px-4 py-2 rounded-xl hover:bg-gray-800 transition">+ Add Tools</a>
            </div>

            <!-- Aksi -->
            <div class="flex flex-row items-center gap-2">
                <a href="{{route('admin.projects.edit' , $project)}}" class="bg-yellow-600 text-white text-xs px-4 py-2 rounded-xl hover:bg-yellow-700 transition">Edit</a>
                
            <form action = "{{route('admin.projects.destroy' , $project)}}" method = 'POST'>
                @csrf
                @method('DELETE');

                <button href="#" class="bg-red-600 text-white text-xs px-4 py-2 rounded-xl hover:bg-red-700 transition">Delete<button>

            </form>

            </div>
        </div>
        <!-- End Card Project -->

        @empty
            <p class="text-gray-500">No projects found.</p>
        @endforelse
    </div>

</x-app-layout>
