<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CustomerBalanceLog;

class CustomerBalanceLogApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_customer_balance_log()
    {
        $customerBalanceLog = CustomerBalanceLog::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/customer_balance_logs', $customerBalanceLog
        );

        $this->assertApiResponse($customerBalanceLog);
    }

    /**
     * @test
     */
    public function test_read_customer_balance_log()
    {
        $customerBalanceLog = CustomerBalanceLog::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/customer_balance_logs/'.$customerBalanceLog->id
        );

        $this->assertApiResponse($customerBalanceLog->toArray());
    }

    /**
     * @test
     */
    public function test_update_customer_balance_log()
    {
        $customerBalanceLog = CustomerBalanceLog::factory()->create();
        $editedCustomerBalanceLog = CustomerBalanceLog::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/customer_balance_logs/'.$customerBalanceLog->id,
            $editedCustomerBalanceLog
        );

        $this->assertApiResponse($editedCustomerBalanceLog);
    }

    /**
     * @test
     */
    public function test_delete_customer_balance_log()
    {
        $customerBalanceLog = CustomerBalanceLog::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/customer_balance_logs/'.$customerBalanceLog->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/customer_balance_logs/'.$customerBalanceLog->id
        );

        $this->response->assertStatus(404);
    }
}
