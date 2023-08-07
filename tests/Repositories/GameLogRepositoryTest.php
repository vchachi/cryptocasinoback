<?php namespace Tests\Repositories;

use App\Models\GameLog;
use App\Repositories\GameLogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class GameLogRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var GameLogRepository
     */
    protected $gameLogRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->gameLogRepo = \App::make(GameLogRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_game_log()
    {
        $gameLog = GameLog::factory()->make()->toArray();

        $createdGameLog = $this->gameLogRepo->create($gameLog);

        $createdGameLog = $createdGameLog->toArray();
        $this->assertArrayHasKey('id', $createdGameLog);
        $this->assertNotNull($createdGameLog['id'], 'Created GameLog must have id specified');
        $this->assertNotNull(GameLog::find($createdGameLog['id']), 'GameLog with given id must be in DB');
        $this->assertModelData($gameLog, $createdGameLog);
    }

    /**
     * @test read
     */
    public function test_read_game_log()
    {
        $gameLog = GameLog::factory()->create();

        $dbGameLog = $this->gameLogRepo->find($gameLog->id);

        $dbGameLog = $dbGameLog->toArray();
        $this->assertModelData($gameLog->toArray(), $dbGameLog);
    }

    /**
     * @test update
     */
    public function test_update_game_log()
    {
        $gameLog = GameLog::factory()->create();
        $fakeGameLog = GameLog::factory()->make()->toArray();

        $updatedGameLog = $this->gameLogRepo->update($fakeGameLog, $gameLog->id);

        $this->assertModelData($fakeGameLog, $updatedGameLog->toArray());
        $dbGameLog = $this->gameLogRepo->find($gameLog->id);
        $this->assertModelData($fakeGameLog, $dbGameLog->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_game_log()
    {
        $gameLog = GameLog::factory()->create();

        $resp = $this->gameLogRepo->delete($gameLog->id);

        $this->assertTrue($resp);
        $this->assertNull(GameLog::find($gameLog->id), 'GameLog should not exist in DB');
    }
}
