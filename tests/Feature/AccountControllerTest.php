<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Band;
use App\Models\User;
use App\Contracts\UserInterface;
use Mockery\MockInterface;

class AccountControllerTest extends TestCase
{
    use RefreshDatabase;
    
    private MockInterface $accountServiceSpy;

    private $userBands = [];

    private static function getUserBands(): array
    {
        return [
            Band::make([
                'id' => 1,
                'name' => 'Imagine-Dragons',
                'genre' => 'test1',

            ]),
            Band::make([
                'id' => 2,
                'name' => 'Funables',
                'genre' => 'test2',
            ]),
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->userBands = self::getUserBands();

        $this->userServiceSpy = $this->spy(UserInterface::class);

    }

    public function test_return_bands(){
        $user = User::factory()->create();
        $this->userServiceSpy->shouldReceive('getBandsByUserId')
            ->once()
            ->andReturn( $this->userBands);

        $response = $this->actingAs($user)
                    ->withSession(['banned' => false])
                    ->get('profile');
        $response->assertViewHas('/bands', $this->userBands);
        $response->assertStatus(200);
    }





}
