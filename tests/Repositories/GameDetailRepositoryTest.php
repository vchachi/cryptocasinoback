<?php namespace Tests\Repositories;

use App\Models\GameDetail;
use App\Repositories\GameDetailRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class GameDetailRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var GameDetailRepository
     */
    protected $gameDetailRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->gameDetailRepo = \App::make(GameDetailRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_game_detail()
    {
        $gameDetail = GameDetail::factory()->make()->toArray();

        $createdGameDetail = $this->gameDetailRepo->create($gameDetail);

        $createdGameDetail = $createdGameDetail->toArray();
        $this->assertArrayHasKey('id', $createdGameDetail);
        $this->assertNotNull($createdGameDetail['id'], 'Created GameDetail must have id specified');
        $this->assertNotNull(GameDetail::find($createdGameDetail['id']), 'GameDetail with given id must be in DB');
        $this->assertModelData($gameDetail, $createdGameDetail);
    }

    /**
     * @test read
     */
    public function test_read_game_detail()
    {
        $gameDetail = GameDetail::factory()->create();

        $dbGameDetail = $this->gameDetailRepo->find($gameDetail->id);

        $dbGameDetail = $dbGameDetail->toArray();
        $this->assertModelData($gameDetail->toArray(), $dbGameDetail);
    }

    /**
     * @test update
     */
    public function test_update_game_detail()
    {
        $gameDetail = GameDetail::factory()->create();
        $fakeGameDetail = GameDetail::factory()->make()->toArray();

        $updatedGameDetail = $this->gameDetailRepo->update($fakeGameDetail, $gameDetail->id);

        $this->assertModelData($fakeGameDetail, $updatedGameDetail->toArray());
        $dbGameDetail = $this->gameDetailRepo->find($gameDetail->id);
        $this->assertModelData($fakeGameDetail, $dbGameDetail->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_game_detail()
    {
        $gameDetail = GameDetail::factory()->create();

        $resp = $this->gameDetailRepo->delete($gameDetail->id);

        $this->assertTrue($resp);
        $this->assertNull(GameDetail::find($gameDetail->id), 'GameDetail should not exist in DB');
    }
}
