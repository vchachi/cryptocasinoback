<?php namespace Tests\Repositories;

use App\Models\CustomerBalanceLog;
use App\Repositories\CustomerBalanceLogRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CustomerBalanceLogRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CustomerBalanceLogRepository
     */
    protected $customerBalanceLogRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->customerBalanceLogRepo = \App::make(CustomerBalanceLogRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_customer_balance_log()
    {
        $customerBalanceLog = CustomerBalanceLog::factory()->make()->toArray();

        $createdCustomerBalanceLog = $this->customerBalanceLogRepo->create($customerBalanceLog);

        $createdCustomerBalanceLog = $createdCustomerBalanceLog->toArray();
        $this->assertArrayHasKey('id', $createdCustomerBalanceLog);
        $this->assertNotNull($createdCustomerBalanceLog['id'], 'Created CustomerBalanceLog must have id specified');
        $this->assertNotNull(CustomerBalanceLog::find($createdCustomerBalanceLog['id']), 'CustomerBalanceLog with given id must be in DB');
        $this->assertModelData($customerBalanceLog, $createdCustomerBalanceLog);
    }

    /**
     * @test read
     */
    public function test_read_customer_balance_log()
    {
        $customerBalanceLog = CustomerBalanceLog::factory()->create();

        $dbCustomerBalanceLog = $this->customerBalanceLogRepo->find($customerBalanceLog->id);

        $dbCustomerBalanceLog = $dbCustomerBalanceLog->toArray();
        $this->assertModelData($customerBalanceLog->toArray(), $dbCustomerBalanceLog);
    }

    /**
     * @test update
     */
    public function test_update_customer_balance_log()
    {
        $customerBalanceLog = CustomerBalanceLog::factory()->create();
        $fakeCustomerBalanceLog = CustomerBalanceLog::factory()->make()->toArray();

        $updatedCustomerBalanceLog = $this->customerBalanceLogRepo->update($fakeCustomerBalanceLog, $customerBalanceLog->id);

        $this->assertModelData($fakeCustomerBalanceLog, $updatedCustomerBalanceLog->toArray());
        $dbCustomerBalanceLog = $this->customerBalanceLogRepo->find($customerBalanceLog->id);
        $this->assertModelData($fakeCustomerBalanceLog, $dbCustomerBalanceLog->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_customer_balance_log()
    {
        $customerBalanceLog = CustomerBalanceLog::factory()->create();

        $resp = $this->customerBalanceLogRepo->delete($customerBalanceLog->id);

        $this->assertTrue($resp);
        $this->assertNull(CustomerBalanceLog::find($customerBalanceLog->id), 'CustomerBalanceLog should not exist in DB');
    }
}
