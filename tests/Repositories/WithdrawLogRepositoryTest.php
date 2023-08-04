<?php namespace Tests\Repositories;

use App\Models\WithdrawLog;
use App\Repositories\WithdrawLogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class WithdrawLogRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var WithdrawLogRepository
     */
    protected $withdrawLogRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->withdrawLogRepo = \App::make(WithdrawLogRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_withdraw_log()
    {
        $withdrawLog = WithdrawLog::factory()->make()->toArray();

        $createdWithdrawLog = $this->withdrawLogRepo->create($withdrawLog);

        $createdWithdrawLog = $createdWithdrawLog->toArray();
        $this->assertArrayHasKey('id', $createdWithdrawLog);
        $this->assertNotNull($createdWithdrawLog['id'], 'Created WithdrawLog must have id specified');
        $this->assertNotNull(WithdrawLog::find($createdWithdrawLog['id']), 'WithdrawLog with given id must be in DB');
        $this->assertModelData($withdrawLog, $createdWithdrawLog);
    }

    /**
     * @test read
     */
    public function test_read_withdraw_log()
    {
        $withdrawLog = WithdrawLog::factory()->create();

        $dbWithdrawLog = $this->withdrawLogRepo->find($withdrawLog->id);

        $dbWithdrawLog = $dbWithdrawLog->toArray();
        $this->assertModelData($withdrawLog->toArray(), $dbWithdrawLog);
    }

    /**
     * @test update
     */
    public function test_update_withdraw_log()
    {
        $withdrawLog = WithdrawLog::factory()->create();
        $fakeWithdrawLog = WithdrawLog::factory()->make()->toArray();

        $updatedWithdrawLog = $this->withdrawLogRepo->update($fakeWithdrawLog, $withdrawLog->id);

        $this->assertModelData($fakeWithdrawLog, $updatedWithdrawLog->toArray());
        $dbWithdrawLog = $this->withdrawLogRepo->find($withdrawLog->id);
        $this->assertModelData($fakeWithdrawLog, $dbWithdrawLog->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_withdraw_log()
    {
        $withdrawLog = WithdrawLog::factory()->create();

        $resp = $this->withdrawLogRepo->delete($withdrawLog->id);

        $this->assertTrue($resp);
        $this->assertNull(WithdrawLog::find($withdrawLog->id), 'WithdrawLog should not exist in DB');
    }
}
