<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <h2 class="font-semibold text-gray-800 leading-tight text-[40px]">
                {{ __('Tools') }}
            </h2>
            <a href="{{ route('admin.tools.create') }}" 
               class="bg-black text-white text-lg px-5 py-2 rounded-xl hover:bg-gray-800 transition">
                + Add New Tool
            </a>
        </div>
    </x-slot>

    <div class="mt-8 space-y-4">
        @forelse($tools as $tool)
            <!-- Card -->
            <div class="flex items-center justify-between bg-white rounded-2xl shadow-md p-4 hover:shadow-lg transition">
                
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <img src="{{ Storage::url($tool->logo) }}" 
                         alt="Tool Logo" 
                         class="w-32 h-20 rounded-lg object-cover border">
                </div>

                <!-- Info -->
                <div class="flex flex-col flex-grow px-4">
                    <p class="font-semibold text-xl text-gray-800">{{ $tool->name }}</p>
                    <p class="text-gray-500 text-sm">{{ $tool->tagline }}</p>
                </div>

                <!-- Actions -->
                <div class="flex flex-row gap-2">
                    <a href="{{ route('admin.tools.edit', $tool) }}" 
                       class="bg-yellow-500 text-white text-sm px-4 py-2 rounded-lg hover:bg-yellow-600 transition">
                        ✏️ Edit
                    </a>
                    
                    <form action="{{ route('admin.tools.destroy', $tool) }}" method="POST" onsubmit="return confirm('Are you sure want to delete this tool?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-red-700 transition">
                            🗑 Delete
                        </button>
                    </form>
                </div>
            </div>
            <!-- End Card -->
        @empty
            <p class="text-gray-500 text-center mt-10">No tools found.</p>
        @endforelse
    </div>
</x-app-layout>
