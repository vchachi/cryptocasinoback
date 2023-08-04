<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\WithdrawLog;

class WithdrawLogApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_withdraw_log()
    {
        $withdrawLog = WithdrawLog::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/withdraw_logs', $withdrawLog
        );

        $this->assertApiResponse($withdrawLog);
    }

    /**
     * @test
     */
    public function test_read_withdraw_log()
    {
        $withdrawLog = WithdrawLog::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/withdraw_logs/'.$withdrawLog->id
        );

        $this->assertApiResponse($withdrawLog->toArray());
    }

    /**
     * @test
     */
    public function test_update_withdraw_log()
    {
        $withdrawLog = WithdrawLog::factory()->create();
        $editedWithdrawLog = WithdrawLog::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/withdraw_logs/'.$withdrawLog->id,
            $editedWithdrawLog
        );

        $this->assertApiResponse($editedWithdrawLog);
    }

    /**
     * @test
     */
    public function test_delete_withdraw_log()
    {
        $withdrawLog = WithdrawLog::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/withdraw_logs/'.$withdrawLog->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/withdraw_logs/'.$withdrawLog->id
        );

        $this->response->assertStatus(404);
    }
}
