<?php

namespace Database\Seeders;

use App\Models\Loan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LoansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Loan::create([
            "book_id"=>1,
            "user_id"=>1,
            "loaned_at"=>"1900-03-05 00:00:00",
            "status"=>"Prestado"
        ]);
    }
}
