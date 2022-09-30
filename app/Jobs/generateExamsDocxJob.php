<?php

namespace App\Jobs;

use App\Models\ExamTool;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class generateExamsDocxJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $examTool;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ExamTool $examTool)
    {
        $this->examTool = $examTool;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        foreach ($this->examTool->course->classRooms as $key => $classRoom) {
            if ($key === array_key_last($this->examTool->course->classRooms->toArray())) {
                dispatch(new generateExamsDocxForClassRoomJob($classRoom, $this->examTool, true));
            } else {
                dispatch(new generateExamsDocxForClassRoomJob($classRoom, $this->examTool));
            }
        }
    }
}