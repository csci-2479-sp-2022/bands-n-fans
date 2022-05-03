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
    use RefreshDatabase;
    
    private MockInterface $bandServiceSpy;

    private $bands = [];

    private static function getBands()
    {

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
    private $genres = [];

    private static function getGenres()
    {

        return [
            Genre::make([
                'id' => 1,
                'name' => 'Rap',

            ]),
            Genre::make([
                'id' => 2,
                'name' => 'Rock',
            ]),
        ];
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->bands = self::getBands();
        $this->genres = self::getGenres();
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

/*     public function test_return_single_band(){
        $this->bandServiceSpy->shouldReceive('getBandById')
            ->with(1)
            ->andReturn($this->bands[0]);

        $response = $this->get('/bands/1');
        $response->assertViewHas('band', $this->bands[0]);
        $response->assertStatus(200);

    } */

    public function test_return_band_register_form(){
        $this->bandServiceSpy->shouldReceive('getGenres')
            ->andReturn($this->genres);

        $response = $this->get('/band');
        $response->assertViewHas('genres', $this->genres);
        $response->assertStatus(200);

    }

    public function test_new_band_can_register()
    {
        $response = $this->post('/band', [
            'name' => 'Test Band',
            'year' => '2020',
        ]);

        $response->assertRedirect('/bands');
        $response->assertStatus(302);
    }

/*     public function test_save_band_function()
    {
        $this->bandServiceSpy->shouldReceive('saveBand')

    } */

    public function test_return_404(){

        $this->bandServiceSpy->shouldReceive('getBands')
        ->andReturn($this->bands);

        $response = $this->get('/bands/103');

        $response->assertStatus(404);
    }
}
