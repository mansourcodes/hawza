<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

/**
 * Class 
 */
class StatisticController extends Controller
{

    /**
     * Title: 
     *
     * @return view
     */
    public function print(Request $request)
    {

        $view = $request->input('view');
        $function =  Str::camel($view) . '_';
        $data = $this->{$function}($request);

        $print = $request->input('print');
        if ($print == 'pdf') {
            $data['print'] = 'pdf';
            // $pdf = PDF::loadView('reports.' . $view, $data);
            // return $pdf->stream();
        }

        $data['print'] = 'print';
        return view('reports.statistic.' . Str::snake($view), $data);
    }





    /**
     * Title: 
     *
     * @return view
     */
    public function classesAndStudentsStatisticsForEachLevel_(Request $request)
    {
        $return['_'] = '';
        $course = Course::find($request->course);
        $return['course'] = $course;


        $curriculums_array = [];
        foreach ($course->classRooms as $key => $classRoom) {
            $curriculums_array = array_merge($curriculums_array,  $classRoom->curriculums);
        }
        $curriculums_statistics  = [];
        foreach ($curriculums_array as $key => $curriculum) {
            $curriculums_statistics[$curriculum['id']] = $curriculum;
        }



        foreach ($course->classRooms as $key => $classRoom) {
            foreach ($classRoom->curriculums as $curriculum_id => $curriculum) {
                if (!isset($curriculums_statistics[$curriculum_id]['count_class_rooms'])) {
                    $curriculums_statistics[$curriculum_id]['count_class_rooms'] = 1;
                    $curriculums_statistics[$curriculum_id]['count_students'] = $classRoom->students->count();
                } else {
                    $curriculums_statistics[$curriculum_id]['count_class_rooms']++;
                    $curriculums_statistics[$curriculum_id]['count_students'] += $classRoom->students->count();
                }
            }
        }

        $return['curriculums_statistics'] = $curriculums_statistics;


        return $return;
    }


    /**
     * Title: 
     *
     * @return view
     */
    public function studentDetectionStatisticsInClasses_(Request $request)
    {
        $return['_'] = '';

        return $return;
    }


    /**
     * Title: 
     *
     * @return view
     */
    public function statisticsForTheNumberOfStudentsInClasses_(Request $request)
    {
        $return['_'] = '';

        return $return;
    }


    /**
     * Title: 
     *
     * @return view
     */
    public function studyGroupDataDisclosureStatistics_(Request $request)
    {
        $return['_'] = '';

        return $return;
    }


    /**
     * Title: 
     *
     * @return view
     */
    public function studentListStatistics_(Request $request)
    {
        $return['_'] = '';

        return $return;
    }


    /**
     * Title: 
     *
     * @return view
     */
    public function studentListStatisticsForEachGrade_(Request $request)
    {
        $return['_'] = '';

        return $return;
    }


    /**
     * Title: 
     *
     * @return view
     */
    public function statisticsOfStudentsScoresAccordingToGrades_(Request $request)
    {
        $return['_'] = '';

        return $return;
    }


    /**
     * Title: 
     *
     * @return view
     */
    public function classAverageScoreStatistics_(Request $request)
    {
        $return['_'] = '';

        return $return;
    }
}
