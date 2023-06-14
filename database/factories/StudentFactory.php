<?php

namespace Database\Factories;


use App\Models\Student ;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Student::class ;

    public function definition()
    {
        return [
            'student_name' => $this->faker->name,
            'student_email' => $this->faker->unique()->safeEmail,
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'image' => $this->faker->imageUrl($width=75, $height=75)
        ];
    }
}
