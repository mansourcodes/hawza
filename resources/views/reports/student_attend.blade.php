@extends('layouts.'.$print)


@section('content')



@foreach ($classroom->students as $student)

<div class="page">

    <h2 class="text-center">{{$settings['student_attend.title']['value'] ?? __('reports.student_attend')}}</h2>


    <br>

    {!! $settings['student_attend.pre']['value'] ?? '' !!}

    <br>

    <table class="table  ">
        <tr>
            <td colspan="2">
                <b>  
                    الاسم:
                </b>

                {{$student->student_name}}
            </td>
            <td>
                <b>
                    البرنامج:
                </b>

                {{$classroom->course->academicPath->academic_path_type}}
            </td>
        </tr>
        <tr>
            <td>
                <b>  
                    المرحلة:
                </b>

                {{$classroom->course->academicPath->academic_path_name}}


            </td>
            <td>
                <b>  
                    السنة الدراسية:
                </b>


                {{$classroom->course->hijri_year}} هـ

                ({{$classroom->course->course_year}} م)

            </td>
            <td>
                <b>  
                    الفصل:
                </b>
                {{$classroom->course->semester}}

            </td>
        </tr>
    </table>

    <br>

    <table class="table text-center ">
        <tr>
            <th rowspan="2 " class="align-middle">
                عدد أيام الدراسة
            </th>
            <th rowspan="2" class="align-middle">
                الحضور
            </th>
            <th colspan="2">
                عدد أيام الغياب
            </th>
            <th colspan="2">
                عدد أيام التأخير
            </th>
        </tr>
        <tr>
            <th>
                بعذر
            </th>
            <th>
                من دون عذر
            </th>
            <th>
                بعذر
            </th>
            <th>
                من دون عذر
            </th>
        </tr>
        <tr>
            <td rowspan="2" class="align-middle">{{$total_days}}</td>
            <td>{{$student_report[$student->id]['attend']}}</td>
            <td>{{$student_report[$student->id]['absent']}}</td>
            <td>{{$student_report[$student->id]['absentWithExcuse']}}</td>
            <td>{{$student_report[$student->id]['late']}}</td>
            <td>{{$student_report[$student->id]['lateWithExcuse']}}</td>
        </tr>
        <tr>
            <td>%{{$student_report[$student->id]['attend_per']}}</td>
            <td>%{{$student_report[$student->id]['absent_per']}}</td>
            <td>%{{$student_report[$student->id]['absentWithExcuse_per']}}</td>
            <td>%{{$student_report[$student->id]['late_per']}}</td>
            <td>%{{$student_report[$student->id]['lateWithExcuse_per']}}</td>
        </tr>
    </table>



    {!! $settings['student_attend.pro']['value'] ?? '' !!}

</div>
<div class="new-page"></div>


@endforeach
@endsection
