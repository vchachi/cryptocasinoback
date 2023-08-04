<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\GameDetail;

class GameDetailApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_game_detail()
    {
        $gameDetail = GameDetail::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/game_details', $gameDetail
        );

        $this->assertApiResponse($gameDetail);
    }

    /**
     * @test
     */
    public function test_read_game_detail()
    {
        $gameDetail = GameDetail::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/game_details/'.$gameDetail->id
        );

        $this->assertApiResponse($gameDetail->toArray());
    }

    /**
     * @test
     */
    public function test_update_game_detail()
    {
        $gameDetail = GameDetail::factory()->create();
        $editedGameDetail = GameDetail::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/game_details/'.$gameDetail->id,
            $editedGameDetail
        );

        $this->assertApiResponse($editedGameDetail);
    }

    /**
     * @test
     */
    public function test_delete_game_detail()
    {
        $gameDetail = GameDetail::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/game_details/'.$gameDetail->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/game_details/'.$gameDetail->id
        );

        $this->response->assertStatus(404);
    }
}
