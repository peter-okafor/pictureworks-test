<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testConsoleSuccess()
    {
        $this->artisan('comments:add 1 hello')
            ->expectsOutput('OK');
    }

    public function testWrongIDError()
    {
        $this->artisan('comments:add power hello')
            ->expectsOutput('invalid id');
    }
}
