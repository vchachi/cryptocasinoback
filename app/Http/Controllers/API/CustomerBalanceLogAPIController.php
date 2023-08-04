<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCustomerBalanceLogAPIRequest;
use App\Http\Requests\API\UpdateCustomerBalanceLogAPIRequest;
use App\Models\CustomerBalanceLog;
use App\Repositories\CustomerBalanceLogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CustomerBalanceLogController
 * @package App\Http\Controllers\API
 */

class CustomerBalanceLogAPIController extends AppBaseController
{
    /** @var  CustomerBalanceLogRepository */
    private $customerBalanceLogRepository;

    public function __construct(CustomerBalanceLogRepository $customerBalanceLogRepo)
    {
        $this->customerBalanceLogRepository = $customerBalanceLogRepo;
    }

    /**
     * Display a listing of the CustomerBalanceLog.
     * GET|HEAD /customerBalanceLogs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $customerBalanceLogs = $this->customerBalanceLogRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($customerBalanceLogs->toArray(), 'Customer Balance Logs retrieved successfully');
    }

    /**
     * Store a newly created CustomerBalanceLog in storage.
     * POST /customerBalanceLogs
     *
     * @param CreateCustomerBalanceLogAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomerBalanceLogAPIRequest $request)
    {
        $input = $request->all();

        $customerBalanceLog = $this->customerBalanceLogRepository->create($input);

        return $this->sendResponse($customerBalanceLog->toArray(), 'Customer Balance Log saved successfully');
    }

    /**
     * Display the specified CustomerBalanceLog.
     * GET|HEAD /customerBalanceLogs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CustomerBalanceLog $customerBalanceLog */
        $customerBalanceLog = $this->customerBalanceLogRepository->find($id);

        if (empty($customerBalanceLog)) {
            return $this->sendError('Customer Balance Log not found');
        }

        return $this->sendResponse($customerBalanceLog->toArray(), 'Customer Balance Log retrieved successfully');
    }

    /**
     * Update the specified CustomerBalanceLog in storage.
     * PUT/PATCH /customerBalanceLogs/{id}
     *
     * @param int $id
     * @param UpdateCustomerBalanceLogAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCustomerBalanceLogAPIRequest $request)
    {
        $input = $request->all();

        /** @var CustomerBalanceLog $customerBalanceLog */
        $customerBalanceLog = $this->customerBalanceLogRepository->find($id);

        if (empty($customerBalanceLog)) {
            return $this->sendError('Customer Balance Log not found');
        }

        $customerBalanceLog = $this->customerBalanceLogRepository->update($input, $id);

        return $this->sendResponse($customerBalanceLog->toArray(), 'CustomerBalanceLog updated successfully');
    }

    /**
     * Remove the specified CustomerBalanceLog from storage.
     * DELETE /customerBalanceLogs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CustomerBalanceLog $customerBalanceLog */
        $customerBalanceLog = $this->customerBalanceLogRepository->find($id);

        if (empty($customerBalanceLog)) {
            return $this->sendError('Customer Balance Log not found');
        }

        $customerBalanceLog->delete();

        return $this->sendSuccess('Customer Balance Log deleted successfully');
    }
}
