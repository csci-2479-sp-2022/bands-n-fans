<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BandControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}

private MockInterface $bandServiceSpy;

private $bands = [];

private static function getBands(): array
{
    return [
        Band::make([
            'id' => 1,
            'name' => 'Imagine-Dragons',

        ]),
        Band::make([
            'id' => 2,
            'name' => 'Funables',

        ]),
    ];
}

protected function setUp(): void
{
    parent::setUp();

    $this->bands = self::getBands();

    $this->bandServiceSpy = $this->spy(BandService::class);

}

public function test_return_bands(){
    $this->bandServiceSpy->shouldReceive('getBands')
        ->once()
        ->andReturn( $this->bands);

    $response = $this->get('/bands');
    $response->assertViewHas('bands', $this->bands);
    $response->assertStatus(200);
}

public function test_return_single_band(){
    $this->bandServiceSpy->shouldReceive('getBandById')
        ->with(1)
        ->once()
        ->andReturn($this->bands[0]);

    $response = $this->get('/bands/1');
    $response->assertViewHas('band', $this->bands[0]);
    $response->assertStatus(200);

}

public function test_return_404(){

    $response = $this->get('/bands/2');

    $response->assertStatus(404);
}
