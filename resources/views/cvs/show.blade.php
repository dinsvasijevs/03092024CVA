<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View CV') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold">{{ $cv->name }}</h3>
                    <p>Email: {{ $cv->email }}</p>
                    <p>Phone: {{ $cv->phone }}</p>

                    <div class="mt-4">
                        <h4 class="font-semibold">Summary</h4>
                        <p>{{ $cv->summary }}</p>
                    </div>

                    <div class="mt-4">
                        <h4 class="font-semibold">Education</h4>
                        <p>{!! nl2br(e($cv->education)) !!}</p>
                    </div>

                    <div class="mt-4">
                        <h4 class="font-semibold">Work Experience</h4>
                        <p>{!! nl2br(e($cv->work_experience)) !!}</p>
                    </div>

                    <div class="mt-4">
                        <h4 class="font-semibold">Skills</h4>
                        <p>{{ $cv->skills }}</p>
                    </div>

                    @if($cv->resume)
                        <div class="mt-4">
                            <h4 class="font-semibold">Resume</h4>
                            <a href="{{ Storage::url($cv->resume) }}" target="_blank" class="text-blue-500 hover:underline">Download Resume</a>
                        </div>
                    @endif

                    <div class="mt-6 flex space-x-4">
                        <a href="{{ route('cvs.edit', $cv) }}" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Edit
                        </a>
                        <form action="{{ route('cvs.destroy', $cv) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this CV?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-red-500 active:bg-red-700 focus:outline-none focus:border-red-700 focus:ring ring-red-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
