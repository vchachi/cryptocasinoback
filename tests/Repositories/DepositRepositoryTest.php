<?php namespace Tests\Repositories;

use App\Models\Deposit;
use App\Repositories\DepositRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DepositRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DepositRepository
     */
    protected $depositRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->depositRepo = \App::make(DepositRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_deposit()
    {
        $deposit = Deposit::factory()->make()->toArray();

        $createdDeposit = $this->depositRepo->create($deposit);

        $createdDeposit = $createdDeposit->toArray();
        $this->assertArrayHasKey('id', $createdDeposit);
        $this->assertNotNull($createdDeposit['id'], 'Created Deposit must have id specified');
        $this->assertNotNull(Deposit::find($createdDeposit['id']), 'Deposit with given id must be in DB');
        $this->assertModelData($deposit, $createdDeposit);
    }

    /**
     * @test read
     */
    public function test_read_deposit()
    {
        $deposit = Deposit::factory()->create();

        $dbDeposit = $this->depositRepo->find($deposit->id);

        $dbDeposit = $dbDeposit->toArray();
        $this->assertModelData($deposit->toArray(), $dbDeposit);
    }

    /**
     * @test update
     */
    public function test_update_deposit()
    {
        $deposit = Deposit::factory()->create();
        $fakeDeposit = Deposit::factory()->make()->toArray();

        $updatedDeposit = $this->depositRepo->update($fakeDeposit, $deposit->id);

        $this->assertModelData($fakeDeposit, $updatedDeposit->toArray());
        $dbDeposit = $this->depositRepo->find($deposit->id);
        $this->assertModelData($fakeDeposit, $dbDeposit->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_deposit()
    {
        $deposit = Deposit::factory()->create();

        $resp = $this->depositRepo->delete($deposit->id);

        $this->assertTrue($resp);
        $this->assertNull(Deposit::find($deposit->id), 'Deposit should not exist in DB');
    }
}
