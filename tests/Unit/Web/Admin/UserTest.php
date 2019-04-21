<?php

namespace Tests\Unit\Web\Admin;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

use Carbon\Carbon;

use App\User;

class UserTest extends TestCase
{
    use RefreshDatabase;
    
    private $user;

    protected function assertPreConditions()
    {
        $user = new User;
        $user->email = 'test@test.com';
        $user->password = bcrypt('test');
        $user->save();

        $this->user = $user;
    }

    /**
     * it should render table.
     *
     * @return void
     */
    public function testTableRender()
    {
        $response = $this->actingAs($this->user)->get('/admin/gas-track');

        $response
            ->assertSeeText('List of Gastracks')
            ->assertSee('<table class="')
            ->assertStatus(200);
    }

    /**
     * it should render table.
     *
     * @return void
     */
    public function testSelectData()
    {
        $response = $this->actingAs($this->user)->get('/admin/web/users/select');

        $response
            ->assertSee('[]')
            ->assertStatus(200);
    }
}
