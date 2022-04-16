<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Band;
use App\Models\Genre;
use App\Contracts\BandInterface;
use Mockery\MockInterface;

class BandControllerTest extends TestCase
{
    private MockInterface $bandServiceSpy;

    private $bands = [];

    private static function getBands()
    {
        $rock = Genre::make([
            'id' => 1,
            'name' => 'rock',
        ]);
        $rap = Genre::make([
            'id' => 2,
            'name' => 'rap',
        ]);

        return [
            Band::make([
                'id' => 1,
                'name' => 'Imagine-Dragons',
                'genre_id' => 1,

            ]),
            Band::make([
                'id' => 2,
                'name' => 'Funables',
                'genre_id' => 2,
            ]),
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->bands = self::getBands();
        $this->bandServiceSpy = $this->spy(BandInterface::class);

    }

    public function test_return_bands(){
        $this->bandServiceSpy->shouldReceive('getBands')
            ->once()
            ->andReturn($this->bands);

        $response = $this->get('/bands');
        $response->assertViewHas('bands', $this->bands);
        $response->assertStatus(200);
    }

    public function test_return_single_band(){
        $this->bandServiceSpy->shouldReceive('getBandById')
            ->with(1)
            ->andReturn($this->bands[0]);

        $response = $this->get('/bands/1');
        $response->assertViewHas('band', $this->bands[0]);
        $response->assertStatus(200);

    }

    public function test_return_404(){

        $this->bandServiceSpy->shouldReceive('getBands')
        ->andReturn($this->bands);

        $response = $this->get('/bands/3');

        $response->assertStatus(404);
    }
}
