<?php

namespace Database\Factories;

use App\Models\Todo;
use Illuminate\Database\Eloquent\Factories\Factory;

class TodoFactory extends Factory
{
    const IMAGE_BASE_URL = 'https://picsum.photos/';

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Todo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'image' => $this->imagePath(),
            'title' => $this->faker->text(32),
            'description' => $this->faker->realText(256),
        ];
    }

    private function imagePath(): string
    {
        $sizes = [
            [1024, 576],  [1366, 768],
            [1920, 1080], [2560, 1440],
        ];

        $size = $sizes[ random_int(0, count($sizes)-1) ];

        return self::IMAGE_BASE_URL . $size[0] . '/' . $size[1];
    }
}
