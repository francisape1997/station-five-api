<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ContextTest extends TestCase
{
    use WithFaker, DatabaseMigrations;

    private const HEADERS = [
        'Accept' => 'Application/json'
    ];

    private const CONTEXT_MESSAGES = [
        'Welcome to StationFive.',
        'Thank you, see you around.',
        "Sorry, I don't understand.",
    ];

    private const CONVERSATION_ID = 'abcd123';

    public function test_first_context()
    {
        $this->seed();

        $this->post('api/message',
        [
            'conversation_id' => self::CONVERSATION_ID,
            'message'         => "Hello, I'm Francis",
        ],
        self::HEADERS)
        ->assertJson(['message' => self::CONTEXT_MESSAGES[0]])
        ->assertStatus(200);
    }

    public function test_second_context()
    {
        $this->seed();

        $this->post('api/message',
        [
            'conversation_id' => self::CONVERSATION_ID,
            'message'         => "Hi, I'm Francis",
        ],
        self::HEADERS)
        ->assertJson(['message' => self::CONTEXT_MESSAGES[0]])
        ->assertStatus(200);
    }

    public function test_third_context()
    {
        $this->seed();

        $this->post('api/message',
        [
            'conversation_id' => self::CONVERSATION_ID,
            'message'         => "Goodbye Francis",
        ],
        self::HEADERS)
        ->assertJson(['message' => self::CONTEXT_MESSAGES[1]])
        ->assertStatus(200);
    }

    public function test_fourth_context()
    {
        $this->seed();

        $this->post('api/message',
        [
            'conversation_id' => self::CONVERSATION_ID,
            'message'         => "bye Francis",
        ],
        self::HEADERS)
        ->assertJson(['message' => self::CONTEXT_MESSAGES[1]])
        ->assertStatus(200);
    }

    public function test_invalid_message_format()
    {
        $this->seed();

        $this->post('api/message',
        [
            'conversation_id' => 123, // Invalid data type
            'message'         => 123 // Invalid data type,
        ],
        self::HEADERS)
        ->assertStatus(422);
    }

    public function test_empty_body()
    {
        $this->seed();

        $this->post('api/message', [], self::HEADERS)->assertStatus(422);
    }

    public function test_no_context_sample_one()
    {
        $this->seed();

        $this->post('api/message',
        [
            'conversation_id' => self::CONVERSATION_ID,
            'message'         => 'No Context',
        ],
        self::HEADERS)
        ->assertJson(['message' => self::CONTEXT_MESSAGES[2]])
        ->assertStatus(422);
    }

    public function test_no_context_sample_two()
    {
        $this->seed();

        $this->post('api/message',
        [
            'conversation_id' => 'Vengeance',
            'message'         => 'Batman',
        ],
        self::HEADERS)
        ->assertJson(['message' => self::CONTEXT_MESSAGES[2]])
        ->assertStatus(422);
    }
}
