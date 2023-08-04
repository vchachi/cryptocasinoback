<?php namespace Tests\Repositories;

use App\Models\Withdraw;
use App\Repositories\WithdrawRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class WithdrawRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var WithdrawRepository
     */
    protected $withdrawRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->withdrawRepo = \App::make(WithdrawRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_withdraw()
    {
        $withdraw = Withdraw::factory()->make()->toArray();

        $createdWithdraw = $this->withdrawRepo->create($withdraw);

        $createdWithdraw = $createdWithdraw->toArray();
        $this->assertArrayHasKey('id', $createdWithdraw);
        $this->assertNotNull($createdWithdraw['id'], 'Created Withdraw must have id specified');
        $this->assertNotNull(Withdraw::find($createdWithdraw['id']), 'Withdraw with given id must be in DB');
        $this->assertModelData($withdraw, $createdWithdraw);
    }

    /**
     * @test read
     */
    public function test_read_withdraw()
    {
        $withdraw = Withdraw::factory()->create();

        $dbWithdraw = $this->withdrawRepo->find($withdraw->id);

        $dbWithdraw = $dbWithdraw->toArray();
        $this->assertModelData($withdraw->toArray(), $dbWithdraw);
    }

    /**
     * @test update
     */
    public function test_update_withdraw()
    {
        $withdraw = Withdraw::factory()->create();
        $fakeWithdraw = Withdraw::factory()->make()->toArray();

        $updatedWithdraw = $this->withdrawRepo->update($fakeWithdraw, $withdraw->id);

        $this->assertModelData($fakeWithdraw, $updatedWithdraw->toArray());
        $dbWithdraw = $this->withdrawRepo->find($withdraw->id);
        $this->assertModelData($fakeWithdraw, $dbWithdraw->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_withdraw()
    {
        $withdraw = Withdraw::factory()->create();

        $resp = $this->withdrawRepo->delete($withdraw->id);

        $this->assertTrue($resp);
        $this->assertNull(Withdraw::find($withdraw->id), 'Withdraw should not exist in DB');
    }
}
