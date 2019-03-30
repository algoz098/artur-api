<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * it should create a user based on the UID giving the api_token.
     *
     * @return void
     */
    public function testAutoRegisterCreating()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'test'])
            ->get('/api/auto-register');

        $user = User::where('uid', 'test')->first();

        $response
            ->assertJson([
                'api_token' => $user->api_token,
            ])
            ->assertStatus(201);
    }

    /**
     * it should return 403 if no Authorization header.
     *
     * @return void
     */
    public function testBlockWithoutHeader()
    {
        $response = $this
            ->get('/api/auto-register');

        $response
            ->assertJson([
                'uid'
            ])
            ->assertStatus(403);
    }

    /**
     * it should return 403 if Authorization header exists wih a token and token is not send.
     *
     * @return void
     */
    public function testUidWithoutToken()
    {
        $user = new User();
        $user->uid = 'test';
        $user->api_token = 'test';
        $user->save();

        $response = $this
            ->withHeaders(['Authorization' => 'test'])
            ->get('/api/auto-register');


        $response
            ->assertJson([
                'token missing'
            ])
            ->assertStatus(403);
    }

    /**
     * it should return 403 if Authorization header and Token dont belongs to each other.
     *
     * @return void
     */
    public function testUidMustBelongsToApiToken()
    {
        $response = $this
            ->withHeaders(['Authorization' => 'test'])
            ->get('/api/auto-register?api_token=test');

        $response
            ->assertJson([
                'invalid request'
            ])
            ->assertStatus(403);
    }

}
