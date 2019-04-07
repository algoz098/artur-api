<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\Vote;

use Carbon\Carbon;

class VoteTest extends TestCase
{
    use RefreshDatabase;

    private $user;

    protected function assertPreConditions()
    {
        $user = new User;
        $user->uid = 'test';
        $user->api_token = 'test';
        $user->save();

        $this->user = $user;
    }

    /**
     * it should save the track
     *
     * @return void
     */
    public function testSaveTrack()
    {
        $data =[
            "origin"        => 'gas-track',
            "stars"         => 5,
            "comment"       => 'This is a test!',
        ];

        $response = $this
            ->withHeaders(['Authorization' => $this->user->uid])
            ->json('POST', '/api/v1/votes/?api_token=' . $this->user->api_token, $data);

        print_r($response->getContent());

        $response->assertStatus(200);

        $this->assertDatabaseHas('votes',  ['user_id' => $this->user->id, 'stars' => 5]);
    }

}
