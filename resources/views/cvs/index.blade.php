<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My CVs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('cvs.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Create New CV</a>

                    @if(session('success'))
                        <div class="mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            <span class="block sm:inline">{{ session('success') }}</span>
                        </div>
                    @endif

                    @if($cvs->isEmpty())
                        <p class="mt-4">You haven't created any CVs yet.</p>
                    @else
                        <div class="mt-4">
                            @foreach($cvs as $cv)
                                <div class="mb-4 p-4 border rounded">
                                    <h3 class="text-lg font-semibold">{{ $cv->name }}</h3>
                                    <p>{{ $cv->email }}</p>
                                    <div class="mt-2">
                                        <a href="{{ route('cvs.show', $cv) }}" class="text-blue-500 hover:underline">View</a>
                                        <a href="{{ route('cvs.edit', $cv) }}" class="ml-2 text-green-500 hover:underline">Edit</a>
                                        <form action="{{ route('cvs.destroy', $cv) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="ml-2 text-red-500 hover:underline" onclick="return confirm('Are you sure you want to delete this CV?')">Delete</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{ $cvs->links() }}
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
