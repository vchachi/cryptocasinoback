<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWithdrawLogAPIRequest;
use App\Http\Requests\API\UpdateWithdrawLogAPIRequest;
use App\Models\WithdrawLog;
use App\Repositories\WithdrawLogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class WithdrawLogController
 * @package App\Http\Controllers\API
 */

class WithdrawLogAPIController extends AppBaseController
{
    /** @var  WithdrawLogRepository */
    private $withdrawLogRepository;

    public function __construct(WithdrawLogRepository $withdrawLogRepo)
    {
        $this->withdrawLogRepository = $withdrawLogRepo;
    }

    /**
     * Display a listing of the WithdrawLog.
     * GET|HEAD /withdrawLogs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $withdrawLogs = $this->withdrawLogRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($withdrawLogs->toArray(), 'Withdraw Logs retrieved successfully');
    }

    /**
     * Store a newly created WithdrawLog in storage.
     * POST /withdrawLogs
     *
     * @param CreateWithdrawLogAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateWithdrawLogAPIRequest $request)
    {
        $input = $request->all();

        $withdrawLog = $this->withdrawLogRepository->create($input);

        return $this->sendResponse($withdrawLog->toArray(), 'Withdraw Log saved successfully');
    }

    /**
     * Display the specified WithdrawLog.
     * GET|HEAD /withdrawLogs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var WithdrawLog $withdrawLog */
        $withdrawLog = $this->withdrawLogRepository->find($id);

        if (empty($withdrawLog)) {
            return $this->sendError('Withdraw Log not found');
        }

        return $this->sendResponse($withdrawLog->toArray(), 'Withdraw Log retrieved successfully');
    }

    /**
     * Update the specified WithdrawLog in storage.
     * PUT/PATCH /withdrawLogs/{id}
     *
     * @param int $id
     * @param UpdateWithdrawLogAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWithdrawLogAPIRequest $request)
    {
        $input = $request->all();

        /** @var WithdrawLog $withdrawLog */
        $withdrawLog = $this->withdrawLogRepository->find($id);

        if (empty($withdrawLog)) {
            return $this->sendError('Withdraw Log not found');
        }

        $withdrawLog = $this->withdrawLogRepository->update($input, $id);

        return $this->sendResponse($withdrawLog->toArray(), 'WithdrawLog updated successfully');
    }

    /**
     * Remove the specified WithdrawLog from storage.
     * DELETE /withdrawLogs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var WithdrawLog $withdrawLog */
        $withdrawLog = $this->withdrawLogRepository->find($id);

        if (empty($withdrawLog)) {
            return $this->sendError('Withdraw Log not found');
        }

        $withdrawLog->delete();

        return $this->sendSuccess('Withdraw Log deleted successfully');
    }
}
