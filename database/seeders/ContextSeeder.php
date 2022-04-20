<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Schema;

use App\Models\ContextMessage;

class ContextSeeder extends Seeder
{
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $messageOne = ContextMessage::create(
            [
                'name' => 'Welcome to StationFive.',
            ],
        );

        $messageTwo = ContextMessage::create(
            [
                'name' => 'Thank you, see you around.',
            ]
        );

        DB::table('contexts')->insert([
            [
                'message_id' => $messageOne->id,
                'name' => 'Hello',
                'created_at' => now(),
            ],
            [
                'message_id' => $messageOne->id,
                'name' => 'Hi',
                'created_at' => now(),
            ],
            [
                'message_id' => $messageTwo->id,
                'name' => 'Goodbye',
                'created_at' => now(),
            ],
            [
                'message_id' => $messageTwo->id,
                'name' => 'bye',
                'created_at' => now(),
            ],
        ]);

        Schema::enableForeignKeyConstraints();
    }
}
