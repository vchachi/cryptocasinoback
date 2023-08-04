<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCustomerBalanceLogRequest;
use App\Http\Requests\UpdateCustomerBalanceLogRequest;
use App\Repositories\CustomerBalanceLogRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CustomerBalanceLogController extends AppBaseController
{
    /** @var CustomerBalanceLogRepository $customerBalanceLogRepository*/
    private $customerBalanceLogRepository;

    public function __construct(CustomerBalanceLogRepository $customerBalanceLogRepo)
    {
        $this->customerBalanceLogRepository = $customerBalanceLogRepo;
    }

    /**
     * Display a listing of the CustomerBalanceLog.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $customerBalanceLogs = $this->customerBalanceLogRepository->all();

        return view('customer_balance_logs.index')
            ->with('customerBalanceLogs', $customerBalanceLogs);
    }

    /**
     * Show the form for creating a new CustomerBalanceLog.
     *
     * @return Response
     */
    public function create()
    {
        $customers = \App\Models\Customer::pluck('name','id');
        $users = \App\Models\User::pluck('name','id');

        return view('customer_balance_logs.create')->with(compact('customers','users'));
    }

    /**
     * Store a newly created CustomerBalanceLog in storage.
     *
     * @param CreateCustomerBalanceLogRequest $request
     *
     * @return Response
     */
    public function store(CreateCustomerBalanceLogRequest $request)
    {
        $input = $request->all();

        $customerBalanceLog = $this->customerBalanceLogRepository->create($input);

        Flash::success('Customer Balance Log saved successfully.');

        return redirect(route('customerBalanceLogs.index'));
    }

    /**
     * Display the specified CustomerBalanceLog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $customerBalanceLog = $this->customerBalanceLogRepository->find($id);

        if (empty($customerBalanceLog)) {
            Flash::error('Customer Balance Log not found');

            return redirect(route('customerBalanceLogs.index'));
        }

        return view('customer_balance_logs.show')->with('customerBalanceLog', $customerBalanceLog);
    }

    /**
     * Show the form for editing the specified CustomerBalanceLog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $customerBalanceLog = $this->customerBalanceLogRepository->find($id);

        if (empty($customerBalanceLog)) {
            Flash::error('Customer Balance Log not found');

            return redirect(route('customerBalanceLogs.index'));
        }

        $customers = \App\Models\Customer::pluck('name','id');
        $users = \App\Models\User::pluck('name','id');

        return view('customer_balance_logs.edit')->with(compact('customerBalanceLog', 'customers','users'));
    }

    /**
     * Update the specified CustomerBalanceLog in storage.
     *
     * @param int $id
     * @param UpdateCustomerBalanceLogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCustomerBalanceLogRequest $request)
    {
        $customerBalanceLog = $this->customerBalanceLogRepository->find($id);

        if (empty($customerBalanceLog)) {
            Flash::error('Customer Balance Log not found');

            return redirect(route('customerBalanceLogs.index'));
        }

        $customerBalanceLog = $this->customerBalanceLogRepository->update($request->all(), $id);

        Flash::success('Customer Balance Log updated successfully.');

        return redirect(route('customerBalanceLogs.index'));
    }

    /**
     * Remove the specified CustomerBalanceLog from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $customerBalanceLog = $this->customerBalanceLogRepository->find($id);

        if (empty($customerBalanceLog)) {
            Flash::error('Customer Balance Log not found');

            return redirect(route('customerBalanceLogs.index'));
        }

        $this->customerBalanceLogRepository->delete($id);

        Flash::success('Customer Balance Log deleted successfully.');

        return redirect(route('customerBalanceLogs.index'));
    }
}
