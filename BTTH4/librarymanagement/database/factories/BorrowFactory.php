<?php

namespace Database\Factories;
use App\Models\Reader;
use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Borrow>
 */
class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'reader_id' => Reader::inRandomOrder()->first()->id, // Lấy ngẫu nhiên một reader đã có
            'book_id' => Book::inRandomOrder()->first()->id, // Lấy ngẫu nhiên một book đã có
            'borrow_date' => $this->faker->date(),
            'return_date' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d'), // Ngày trả trong vòng 1 tháng
            'status' => $this->faker->boolean(), // Trạng thái ngẫu nhiên
        ];
    }
}
