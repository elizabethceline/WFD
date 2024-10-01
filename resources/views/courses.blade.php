@extends('base/base2')

@section('content')
    @if (session('success'))
        <div id="success-alert"
            class="fixed mx-auto mt-4 w-1/3 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded shadow-md"
            role="alert">
            <div class="flex justify-between items-center">
                <span>{{ session('success') }}</span>
                <button onclick="document.getElementById('success-alert').style.display='none'"
                    class="text-green-700 hover:text-green-900 font-bold ml-4">
                    &times;
                </button>
            </div>
        </div>
    @endif
    <a href="{{ route('course.create') }}"
        class="rounded-md bg-indigo-600 px-3 py-3 text-sm font-semibold hover:bg-indigo-400 text-white">Insert Course</a>
    <div class="container my-4 mx-auto grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach ($courses as $course)
            <div class="bg-white dark:bg-slate-800 rounded-lg px-6 py-8 ring-1 ring-slate-900/5 shadow-xl">
                <div>
                    <span class="inline-flex items-center justify-center p-2 bg-indigo-500 rounded-md shadow-lg">
                        <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><!-- ... --></svg>
                    </span>
                </div>
                <h3 class="text-slate-900 dark:text-white mt-5 text-base font-medium tracking-tight">
                    {{ $course['course_name'] }}</h3>
                <h3 class="text-slate-900 dark:text-white text-base font-medium tracking-tight">
                    {{ $course['course_name_en'] }}</h3>
                <h3 class="text-slate-900 dark:text-white text-base font-medium tracking-tight">
                    {{ $course->unit->name }}</h3>
                <p class="text-slate-500 dark:text-slate-400 mt-2 text-sm">
                    The Zero Gravity Pen can be used to write in any orientation, including upside-down. It even works in
                    outer space.
                </p>
                <div class="mt-10 flex items-center justify-center">
                    <a href="/course/view/{{ $course['id'] }}"
                        class="mx-3 rounded-md bg-indigo-600 px-3 py-3 text-sm font-semibold hover:bg-indigo-400 text-white">Details</a>
                    <a href="/course/edit/{{ $course['id'] }}"
                        class="mx-3 rounded-md bg-indigo-300 px-3 py-3 text-sm font-semibold hover:bg-indigo-800 text-black">Edit</a>
                    {{-- <a href="/course/delete/{{ $course['id'] }}"
                        class="mx-3 rounded-md bg-red-500 px-3 py-3 text-sm font-semibold hover:bg-red-800 text-white">Delete</a> --}}
                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                        action="{{ route('course.delete', $course->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="mx-3 rounded-md bg-red-500 px-3 py-3 text-sm font-semibold hover:bg-red-800 text-white">Delete</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection
