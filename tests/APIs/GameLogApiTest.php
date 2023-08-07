<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\GameLog;

class GameLogApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_game_log()
    {
        $gameLog = GameLog::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/game_logs', $gameLog
        );

        $this->assertApiResponse($gameLog);
    }

    /**
     * @test
     */
    public function test_read_game_log()
    {
        $gameLog = GameLog::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/game_logs/'.$gameLog->id
        );

        $this->assertApiResponse($gameLog->toArray());
    }

    /**
     * @test
     */
    public function test_update_game_log()
    {
        $gameLog = GameLog::factory()->create();
        $editedGameLog = GameLog::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/game_logs/'.$gameLog->id,
            $editedGameLog
        );

        $this->assertApiResponse($editedGameLog);
    }

    /**
     * @test
     */
    public function test_delete_game_log()
    {
        $gameLog = GameLog::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/game_logs/'.$gameLog->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/game_logs/'.$gameLog->id
        );

        $this->response->assertStatus(404);
    }
}
