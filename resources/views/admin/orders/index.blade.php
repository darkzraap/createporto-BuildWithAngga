<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-gray-800 leading-tight text-[50px]">
            {{ __('MY ORDER') }}
        </h2>
    </x-slot>

    <div class="border mt-6"> 

        <!-- Card Project -->
<div class="border mt-6"> 
    @forelse($orders as $order)
    <!-- Card Project -->
    <div class="hover:bg-gray-300 flex flex-col md:flex-row md:items-center justify-between p-6 bg-white rounded-xl shadow-md gap-6">
        
        <!-- Info Project -->
        <div class="flex flex-col flex-grow space-y-1">
            <p class="font-semibold text-lg text-gray-800">{{$order->name}}</p>
            <p class="text-gray-700 text-sm">Email : {{$order->email}}</p>
            <p class="text-gray-700 text-sm">Category : {{$order->category}}</p>
            <p class="text-gray-700 text-sm">Brief : {{$order->brief}}</p>
            <p class="text-gray-700 text-sm">Budget : {{$order->budget}}</p>
        </div>

        <!-- Aksi -->
        <div class="flex flex-row items-center gap-2 mt-4 md:mt-0">
            <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-600 text-white text-xs px-4 py-2 rounded-xl hover:bg-red-700 transition">
                    Delete
                </button>
            </form>
        </div>
    </div>
    @empty
        <p class="text-center p-6">Orders Not Found</p>
    @endforelse
</div>

</x-app-layout>
