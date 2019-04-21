<?php

namespace Tests\Unit\Web;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Carbon\Carbon;

class GasTrackTest extends TestCase
{
    use RefreshDatabase;

    /**
     * it should render web home.
     *
     * @return void
     */
    public function testHomeRender()
    {
        $response = $this->get('/gas-track');

        $response
            ->assertSeeText('See in Google Play')
            ->assertStatus(200);
    }

    // /**
    //  * it should allow login in web
    //  *
    //  * @return void
    //  */
    // public function testLogin()
    // {
    //     $user = new User();
    //     $user->email = 'test@test.com';
    //     $user->password = bcrypt('test');
    //     $user->save();

    //     $response = $this->get('/login');

    //     $response
    //         ->assertSeeText('E-Mail Address')
    //         ->assertStatus(200);

    //     $response = $this->withSession(['_token'=>'test'])
    //     ->json('POST', '/login', [
    //         '_token'=>'test',
    //         'email' => 'test@test.com',
    //         'password' => 'test',
    //     ]);
        
    //     $response->assertStatus(302);
        
    //     $response = $this->withSession(['_token'=>'test'])->get('/');

    //     $response
    //         ->assertSeeText('Gas Track Quasar')
    //         ->assertDontSeeText('Login')
    //         ->assertSeeText('Admin')
    //         ->assertStatus(200);
    // }

    // /**
    //  * it should allow logout in web
    //  *
    //  * @return void
    //  */
    // public function testLogout()
    // {
    //     $user = new User();
    //     $user->email = 'test@test.com';
    //     $user->password = bcrypt('test');
    //     $user->save();

        
    //     $response = $this->actingAs($user)->withSession(['_token'=>'test'])->get('/');

    //     $response
    //         ->assertSeeText('Gas Track Quasar')
    //         ->assertDontSeeText('Login')
    //         ->assertSeeText('Admin')
    //         ->assertStatus(200);

    //     $response = $this->withSession(['_token'=>'test'])
    //         ->json('POST', '/logout', [
    //             '_token'=>'test',
    //         ]);

    //     $response
    //         ->assertStatus(302);
        
    //     $response = $this->withSession(['_token'=>'test'])->get('/');

    //     $response
    //         ->assertSeeText('Gas Track Quasar')
    //         ->assertSeeText('Login')
    //         ->assertDontSeeText('Admin')
    //         ->assertStatus(200);
    // }
}
