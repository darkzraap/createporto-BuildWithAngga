<x-app-layout>
    
    <x-slot name="header">
        <h2 class="font-bold text-gray-800 leading-tight text-4xl tracking-wide">
            {{ __('Assign Screenshoots') }}
        </h2>
    </x-slot>

    <div class="flex justify-center mt-10 ">
        <div class="w-[50rem] h-max rounded-2xl bg-white shadow-xl mb-28">
            <div class="p-10 text-gray-900">

                <form action="{{ route('admin.screenshots.assign.project.store' , $project) }}" enctype="multipart/form-data" method="POST" class="flex flex-col gap-y-8">
                    @csrf
                   
                                  <div class="flex flex-col gap-y-3">
                        <label for="logo" class="text-gray-700 font-medium">Screenshoot</label>
                        <label for="logo" 
                            class="flex items-center justify-center px-6 py-3 bg-indigo-600 text-white rounded-lg cursor-pointer hover:bg-indigo-700 transition">
                            Pilih
                        </label>
                        <input type="file" id="screenshot" name="screenshot" >
                        <p class="text-sm text-gray-500">Format: JPG, PNG | Max: 2MB</p>

                        @error('logo')
                            <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                  
                
                    <div class="flex justify-center">
                        <button type="submit" 
                            class="mt-6 w-[12rem] py-2 bg-indigo-600 text-white font-semibold rounded-lg shadow-md hover:bg-indigo-700 transition">
                            Assign Screenshots
                        </button>
                    </div>

                </form>


                
            </div>
        </div>
    </div>


@forelse($project->screenshots as $screenshot)
    <div class="mx-auto h-28 bg-white mt-6 w-[50rem] flex justify-between items-center rounded-2xl shadow gap-10 mb-12 px-6">

        <!-- Tool Logo -->
        <div class="flex items-center">
            <img src="{{ Storage::url($screenshot->screenshot) }}" class="w-[8rem] h-[5rem] rounded-xl object-cover ml-20" >
        </div>

       

        <!-- Delete Button -->
        <div class="flex items-center">
            <form action="{{route('admin.screenshots.assign.project.destroy', $screenshot)}}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 text-white text-xs px-4 py-2 rounded hover:bg-red-600 transition">
                    Delete
                </button>
            </form>
        </div>
        
    </div>
@empty
    <p class="text-center text-gray-500 mt-10">No Screenshots found for this project.</p>
@endforelse


</x-app-layout>
