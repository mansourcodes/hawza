@extends('layouts.' . $print)


@section('content')
    @foreach ($classRooms as $classRoom)
        @foreach ($classRoom->curriculums as $curriculum)
            <div class="page">

                @if (Setting::get('print_header'))
                    <img class="w-100" src="{{ URL::asset(Setting::get('print_header')) }}" />
                @endif

                <h1 class="title text-center">
                    {{ $course->long_name }}
                </h1>

                <h3 class="title text-center">
                    {{ empty(Setting::get('teacher_table.title')) ? __('reports.teacher_table') : Setting::get('teacher_table.title') }}
                </h3>


                {!! Setting::get('teacher_table.pre') !!}

                <table class="table table-striped table-bordered">
                    <tbody>
                        <tr>
                            <td>
                                {{ $curriculum['curriculumـname'] ?? '' }} -
                                {{ $curriculum['teacher_name'] ?? '' }} -
                                {{ $classRoom->long_name }}</td>
                        </tr>
                    </tbody>
                </table>

                <table class="table table-striped table-bordered">


                    <tbody>
                        <tr>
                            <td>اسم المدرس</td>
                            <td>{{ $curriculum['teacher_name'] ?? '' }}</td>
                        </tr>
                        <tr>
                            <td>رقم الصف</td>
                            <td>{{ $classRoom->class_room_number }} {{ $classRoom->class_room_name }}</td>
                        </tr>
                        <tr>
                            <td>مكان الدراسة</td>
                            <td>{{ $classRoom->class_room_name }}</td>
                        </tr>
                        <tr>
                            <td>يوم وتاريخ بدء الدراسة</td>
                            <td>{{ $course->start_date->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <td>يوم وتاريخ نهاية الدراسة</td>
                            <td>{{ $course->end_date->format('d-m-Y') }}</td>
                        </tr>
                        <tr>
                            <td>عدد ساعات المقررة</td>
                            <td>{{ $course->duration }}</td>
                        </tr>
                        <tr>
                            <td>وقت الدراسة</td>
                            <td>
                                @foreach ($curriculum['days'] as $day)
                                    {{ $weekDays[$day] ?? '' }} {{ $curriculum['attend_table'][$day] ?? '' }} <br>
                                @endforeach

                            </td>
                        </tr>
                    </tbody>
                </table>



                {!! Setting::get('teacher_table.pro') !!}

            </div>
            <div class="new-page"></div>
        @endforeach
    @endforeach
@endsection
