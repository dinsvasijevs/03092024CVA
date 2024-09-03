<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit CV') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form method="POST" action="{{ route('cvs.update', $cv) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" id="name" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('name', $cv->name) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('email', $cv->email) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="phone" class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="text" name="phone" id="phone" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('phone', $cv->phone) }}" required>
                        </div>

                        <div class="mb-4">
                            <label for="summary" class="block text-sm font-medium text-gray-700">Summary</label>
                            <textarea name="summary" id="summary" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>{{ old('summary', $cv->summary) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label for="education" class="block text-sm font-medium text-gray-700">Education</label>
                            <textarea name="education" id="education" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>{{ old('education', $cv->education) }}</textarea>
                            <p class="mt-1 text-sm text-gray-500">Enter each education item on a new line.</p>
                        </div>

                        <div class="mb-4">
                            <label for="work_experience" class="block text-sm font-medium text-gray-700">Work Experience</label>
                            <textarea name="work_experience" id="work_experience" rows="3" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>{{ old('work_experience', $cv->work_experience) }}</textarea>
                            <p class="mt-1 text-sm text-gray-500">Enter each work experience item on a new line.</p>
                        </div>

                        <div class="mb-4">
                            <label for="skills" class="block text-sm font-medium text-gray-700">Skills</label>
                            <input type="text" name="skills" id="skills" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('skills', $cv->skills) }}" required>
                            <p class="mt-1 text-sm text-gray-500">Enter skills separated by commas.</p>
                        </div>

                        <div class="mb-4">
                            <label for="resume" class="block text-sm font-medium text-gray-700">Resume (PDF, DOC, DOCX)</label>
                            <input type="file" name="resume" id="resume" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                            @if($cv->resume)
                                <p class="mt-1 text-sm text-gray-500">Current file: {{ basename($cv->resume) }}</p>
                            @endif
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <button type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                Update CV
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
