<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDepositDetailAPIRequest;
use App\Http\Requests\API\UpdateDepositDetailAPIRequest;
use App\Models\DepositDetail;
use App\Repositories\DepositDetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DepositDetailController
 * @package App\Http\Controllers\API
 */

class DepositDetailAPIController extends AppBaseController
{
    /** @var  DepositDetailRepository */
    private $depositDetailRepository;

    public function __construct(DepositDetailRepository $depositDetailRepo)
    {
        $this->depositDetailRepository = $depositDetailRepo;
    }

    /**
     * Display a listing of the DepositDetail.
     * GET|HEAD /depositDetails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $depositDetails = $this->depositDetailRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($depositDetails->toArray(), 'Deposit Details retrieved successfully');
    }

    /**
     * Store a newly created DepositDetail in storage.
     * POST /depositDetails
     *
     * @param CreateDepositDetailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDepositDetailAPIRequest $request)
    {
        $input = $request->all();

        $depositDetail = $this->depositDetailRepository->create($input);

        return $this->sendResponse($depositDetail->toArray(), 'Deposit Detail saved successfully');
    }

    /**
     * Display the specified DepositDetail.
     * GET|HEAD /depositDetails/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DepositDetail $depositDetail */
        $depositDetail = $this->depositDetailRepository->find($id);

        if (empty($depositDetail)) {
            return $this->sendError('Deposit Detail not found');
        }

        return $this->sendResponse($depositDetail->toArray(), 'Deposit Detail retrieved successfully');
    }

    /**
     * Update the specified DepositDetail in storage.
     * PUT/PATCH /depositDetails/{id}
     *
     * @param int $id
     * @param UpdateDepositDetailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepositDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var DepositDetail $depositDetail */
        $depositDetail = $this->depositDetailRepository->find($id);

        if (empty($depositDetail)) {
            return $this->sendError('Deposit Detail not found');
        }

        $depositDetail = $this->depositDetailRepository->update($input, $id);

        return $this->sendResponse($depositDetail->toArray(), 'DepositDetail updated successfully');
    }

    /**
     * Remove the specified DepositDetail from storage.
     * DELETE /depositDetails/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DepositDetail $depositDetail */
        $depositDetail = $this->depositDetailRepository->find($id);

        if (empty($depositDetail)) {
            return $this->sendError('Deposit Detail not found');
        }

        $depositDetail->delete();

        return $this->sendSuccess('Deposit Detail deleted successfully');
    }
}
