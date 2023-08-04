<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateWithdrawAPIRequest;
use App\Http\Requests\API\UpdateWithdrawAPIRequest;
use App\Models\Withdraw;
use App\Repositories\WithdrawRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class WithdrawController
 * @package App\Http\Controllers\API
 */

class WithdrawAPIController extends AppBaseController
{
    /** @var  WithdrawRepository */
    private $withdrawRepository;

    public function __construct(WithdrawRepository $withdrawRepo)
    {
        $this->withdrawRepository = $withdrawRepo;
    }

    /**
     * Display a listing of the Withdraw.
     * GET|HEAD /withdraws
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $withdraws = $this->withdrawRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($withdraws->toArray(), 'Withdraws retrieved successfully');
    }

    /**
     * Store a newly created Withdraw in storage.
     * POST /withdraws
     *
     * @param CreateWithdrawAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateWithdrawAPIRequest $request)
    {
        $input = $request->all();

        $withdraw = $this->withdrawRepository->create($input);

        return $this->sendResponse($withdraw->toArray(), 'Withdraw saved successfully');
    }

    /**
     * Display the specified Withdraw.
     * GET|HEAD /withdraws/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Withdraw $withdraw */
        $withdraw = $this->withdrawRepository->find($id);

        if (empty($withdraw)) {
            return $this->sendError('Withdraw not found');
        }

        return $this->sendResponse($withdraw->toArray(), 'Withdraw retrieved successfully');
    }

    /**
     * Update the specified Withdraw in storage.
     * PUT/PATCH /withdraws/{id}
     *
     * @param int $id
     * @param UpdateWithdrawAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWithdrawAPIRequest $request)
    {
        $input = $request->all();

        /** @var Withdraw $withdraw */
        $withdraw = $this->withdrawRepository->find($id);

        if (empty($withdraw)) {
            return $this->sendError('Withdraw not found');
        }

        $withdraw = $this->withdrawRepository->update($input, $id);

        return $this->sendResponse($withdraw->toArray(), 'Withdraw updated successfully');
    }

    /**
     * Remove the specified Withdraw from storage.
     * DELETE /withdraws/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Withdraw $withdraw */
        $withdraw = $this->withdrawRepository->find($id);

        if (empty($withdraw)) {
            return $this->sendError('Withdraw not found');
        }

        $withdraw->delete();

        return $this->sendSuccess('Withdraw deleted successfully');
    }
}
