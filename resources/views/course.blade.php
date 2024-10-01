@extends('base.base2')

@section('content')
    <div class="container px-16 my-4 mx-auto">
        <article>
            <h1 class="text-2xl font-bold">{{ $course['course_name'] }} || {{ $course['course_code'] }}</h1>
            <hr>
            <p><span class="font-bold">Nama Inggris:</span> {{ $course['course_name_en'] }}</p>
            <p><span class="font-bold">Tahun:</span> {{ $course['year'] }}</p>
            <p><span class="font-bold">Jumlah Mahasiswa:</span> {{ $studentCount }}</p>
            <p><span class="font-bold">Details:</span> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus
                dolor provident libero id
                dolores sequi.</p>
            <a href="/courses" class="underline text-slate-700">Back to All Courses</a>
        </article>

        <p class="font-bold">Student Enrolled</p>
        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Nama</td>
                    <td>Program</td>
                </tr>
            </thead>
            <tbody>
                @php
                    $no = 1;
                @endphp
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->unit->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
