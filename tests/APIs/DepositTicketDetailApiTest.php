<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\DepositTicketDetail;

class DepositTicketDetailApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_deposit_ticket_detail()
    {
        $depositTicketDetail = DepositTicketDetail::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/deposit_ticket_details', $depositTicketDetail
        );

        $this->assertApiResponse($depositTicketDetail);
    }

    /**
     * @test
     */
    public function test_read_deposit_ticket_detail()
    {
        $depositTicketDetail = DepositTicketDetail::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/deposit_ticket_details/'.$depositTicketDetail->id
        );

        $this->assertApiResponse($depositTicketDetail->toArray());
    }

    /**
     * @test
     */
    public function test_update_deposit_ticket_detail()
    {
        $depositTicketDetail = DepositTicketDetail::factory()->create();
        $editedDepositTicketDetail = DepositTicketDetail::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/deposit_ticket_details/'.$depositTicketDetail->id,
            $editedDepositTicketDetail
        );

        $this->assertApiResponse($editedDepositTicketDetail);
    }

    /**
     * @test
     */
    public function test_delete_deposit_ticket_detail()
    {
        $depositTicketDetail = DepositTicketDetail::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/deposit_ticket_details/'.$depositTicketDetail->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/deposit_ticket_details/'.$depositTicketDetail->id
        );

        $this->response->assertStatus(404);
    }
}
