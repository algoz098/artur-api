<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use App\User;
use App\GasTrack;

use Carbon\Carbon;

class GasTrackTest extends TestCase
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
     * it should return 403 if no Authorization header exists and token.
     *
     * @return void
     */
    public function testNonAuthRequest()
    {
        $response = $this
            ->get('/api/v1/gas-track');

        $response
            ->assertJson([
                'uid'
            ])
            ->assertStatus(403);
    }

    /**
     * it should return 403 if no token.
     *
     * @return void
     */
    public function testNonToken()
    {
        $response = $this
            ->withHeaders(['Authorization' => $this->user->uid])
            ->get('/api/v1/gas-track');

        $response
            ->assertJson([
                'token'
            ])
            ->assertStatus(403);
    }
    
    /**
     * it should return 403 if invalid token.
     *
     * @return void
     */
    public function testFakeTokenRequest()
    {
        $response = $this
            ->withHeaders(['Authorization' => $this->user->uid])
            ->get('/api/v1/gas-track?api_token=fake');

        $response
            ->assertJson([
                'register'
            ])
            ->assertStatus(403);
    }

    /**
     * it should return saved tracks for the user
     *
     * @return void
     */
    public function testReturnListTracks()
    {
        $this->user->gasTracks()->save(factory(GasTrack::class)->make());
        $response = $this
            ->withHeaders(['Authorization' => $this->user->uid])
            ->get('/api/v1/gas-track?api_token=' . $this->user->api_token);

        $response
            ->assertSee($this->user->gasTracks[0]->toJson())
            ->assertStatus(200);
    }

    /**
     * it should remove the track
     *
     * @return void
     */
    public function testRemoveTrack()
    {
        $this->user->gasTracks()->save(factory(GasTrack::class)->make());

        $track = $this->user->gasTracks[0];

        $response = $this
            ->withHeaders(['Authorization' => $this->user->uid])
            ->get('/api/v1/gas-track/'.$track->id.'/delete?api_token=' . $this->user->api_token);

        $response->assertStatus(200);


        $this->assertDatabaseMissing('gas_tracks',  $track->toArray());
    }
    
    /**
     * it should save the track
     *
     * @return void
     */
    public function testSaveTrack()
    {
        $data =[
            [
                "km_actual"     => '111',
                "lts_add"       => 1.11,
                "date"          => Carbon::now()->serialize(),
                "price"         => 1.11,
                "total"         => 1.11,
                "km_lt"         => 1.11,
                "wheeled"       => null,
                "total_wheeled" => 1.11,
                "saved"         => null,
            ]
        ];

        $response = $this
            ->withHeaders(['Authorization' => $this->user->uid])
            ->json('POST', '/api/v1/gas-track/?api_token=' . $this->user->api_token, $data);
        
        $response->assertStatus(200);

        $this->assertDatabaseHas('gas_tracks',  ['user_id' => $this->user->id]);
    }

}
