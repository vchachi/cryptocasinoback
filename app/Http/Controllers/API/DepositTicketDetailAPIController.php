<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateDepositTicketDetailAPIRequest;
use App\Http\Requests\API\UpdateDepositTicketDetailAPIRequest;
use App\Models\DepositTicketDetail;
use App\Repositories\DepositTicketDetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class DepositTicketDetailController
 * @package App\Http\Controllers\API
 */

class DepositTicketDetailAPIController extends AppBaseController
{
    /** @var  DepositTicketDetailRepository */
    private $depositTicketDetailRepository;

    public function __construct(DepositTicketDetailRepository $depositTicketDetailRepo)
    {
        $this->depositTicketDetailRepository = $depositTicketDetailRepo;
    }

    /**
     * Display a listing of the DepositTicketDetail.
     * GET|HEAD /depositTicketDetails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $depositTicketDetails = $this->depositTicketDetailRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($depositTicketDetails->toArray(), 'Deposit Ticket Details retrieved successfully');
    }

    /**
     * Store a newly created DepositTicketDetail in storage.
     * POST /depositTicketDetails
     *
     * @param CreateDepositTicketDetailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateDepositTicketDetailAPIRequest $request)
    {
        $input = $request->all();

        $depositTicketDetail = $this->depositTicketDetailRepository->create($input);

        return $this->sendResponse($depositTicketDetail->toArray(), 'Deposit Ticket Detail saved successfully');
    }

    /**
     * Display the specified DepositTicketDetail.
     * GET|HEAD /depositTicketDetails/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var DepositTicketDetail $depositTicketDetail */
        $depositTicketDetail = $this->depositTicketDetailRepository->find($id);

        if (empty($depositTicketDetail)) {
            return $this->sendError('Deposit Ticket Detail not found');
        }

        return $this->sendResponse($depositTicketDetail->toArray(), 'Deposit Ticket Detail retrieved successfully');
    }

    /**
     * Update the specified DepositTicketDetail in storage.
     * PUT/PATCH /depositTicketDetails/{id}
     *
     * @param int $id
     * @param UpdateDepositTicketDetailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepositTicketDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var DepositTicketDetail $depositTicketDetail */
        $depositTicketDetail = $this->depositTicketDetailRepository->find($id);

        if (empty($depositTicketDetail)) {
            return $this->sendError('Deposit Ticket Detail not found');
        }

        $depositTicketDetail = $this->depositTicketDetailRepository->update($input, $id);

        return $this->sendResponse($depositTicketDetail->toArray(), 'DepositTicketDetail updated successfully');
    }

    /**
     * Remove the specified DepositTicketDetail from storage.
     * DELETE /depositTicketDetails/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var DepositTicketDetail $depositTicketDetail */
        $depositTicketDetail = $this->depositTicketDetailRepository->find($id);

        if (empty($depositTicketDetail)) {
            return $this->sendError('Deposit Ticket Detail not found');
        }

        $depositTicketDetail->delete();

        return $this->sendSuccess('Deposit Ticket Detail deleted successfully');
    }
}
