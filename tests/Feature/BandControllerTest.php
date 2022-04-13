<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Band;
use App\Contracts\BandInterface;
use Mockery\MockInterface;

class BandControllerTest extends TestCase
{
    use RefreshDatabase;

    private MockInterface $bandServiceSpy;

    private $bands = [];

    private static function getBands(): array
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

        $this->bands = self::getBands();

        $this->bandServiceSpy = $this->spy(BandInterface::class);

    }

    public function test_return_bands(){
        $this->bandServiceSpy->shouldReceive('getBands')
            ->once()
            ->andReturn( $this->bands);

        $response = $this->get('/bands');
        var_dump($response);
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