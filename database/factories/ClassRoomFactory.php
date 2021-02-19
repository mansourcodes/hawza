<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\ClassRoom;

class ClassRoomFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ClassRoom::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'class_room_name' => 'فصل المعلم ' . $this->faker->firstNameMale,
            'class_room_number' => 'غرفة رقم ' . $this->faker->numberBetween(1, 10),
            'course_id' => $this->faker->numberBetween(1, 10),
        ];
    }
}
