<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PostTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testPostCommentSuccess()
    {
        $response = $this->json('POST', '/user', [
            'id' => '1',
            'password' => '720DF6C2482218518FA20FDC52D4DED7ECC043AB',
            'comments' => 'this is a comment'
        ]);

        $response->assertStatus(200);
    }

    public function testWrongPasswordError()
    {
        $response = $this->json('POST', '/user', [
            'id' => '3',
            'password' => 'wrongpassword',
            'comments' => 'this is a comment'
        ]);

        $response->assertStatus(401)->assertExactJson(['invalid password']);
    }

    public function testWrongIDError()
    {
        $response = $this->json('POST', '/user', [
            'id' => 'hello',
            'password' => '720DF6C2482218518FA20FDC52D4DED7ECC043AB',
            'comments' => 'this is a comment'
        ]);

        $response->assertStatus(422)->assertExactJson(['invalid id']);
    }
}
