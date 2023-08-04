<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\DepositDetail;

class DepositDetailApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_deposit_detail()
    {
        $depositDetail = DepositDetail::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/deposit_details', $depositDetail
        );

        $this->assertApiResponse($depositDetail);
    }

    /**
     * @test
     */
    public function test_read_deposit_detail()
    {
        $depositDetail = DepositDetail::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/deposit_details/'.$depositDetail->id
        );

        $this->assertApiResponse($depositDetail->toArray());
    }

    /**
     * @test
     */
    public function test_update_deposit_detail()
    {
        $depositDetail = DepositDetail::factory()->create();
        $editedDepositDetail = DepositDetail::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/deposit_details/'.$depositDetail->id,
            $editedDepositDetail
        );

        $this->assertApiResponse($editedDepositDetail);
    }

    /**
     * @test
     */
    public function test_delete_deposit_detail()
    {
        $depositDetail = DepositDetail::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/deposit_details/'.$depositDetail->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/deposit_details/'.$depositDetail->id
        );

        $this->response->assertStatus(404);
    }
}
