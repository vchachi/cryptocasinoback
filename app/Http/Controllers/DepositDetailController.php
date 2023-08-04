<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateDepositDetailRequest;
use App\Http\Requests\UpdateDepositDetailRequest;
use App\Repositories\DepositDetailRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class DepositDetailController extends AppBaseController
{
    /** @var DepositDetailRepository $depositDetailRepository*/
    private $depositDetailRepository;

    public function __construct(DepositDetailRepository $depositDetailRepo)
    {
        $this->depositDetailRepository = $depositDetailRepo;
    }

    /**
     * Display a listing of the DepositDetail.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $depositDetails = $this->depositDetailRepository->all();

        return view('deposit_details.index')
            ->with('depositDetails', $depositDetails);
    }

    /**
     * Show the form for creating a new DepositDetail.
     *
     * @return Response
     */
    public function create()
    {
        $deposits = \App\Models\Deposit::pluck('id','id');
        $users = \App\Models\User::pluck('name','id');

        return view('deposit_details.create')->with(compact('deposits','users'));
    }

    /**
     * Store a newly created DepositDetail in storage.
     *
     * @param CreateDepositDetailRequest $request
     *
     * @return Response
     */
    public function store(CreateDepositDetailRequest $request)
    {
        $input = $request->all();

        $depositDetail = $this->depositDetailRepository->create($input);

        Flash::success('Deposit Detail saved successfully.');

        return redirect(route('depositDetails.index'));
    }

    /**
     * Display the specified DepositDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $depositDetail = $this->depositDetailRepository->find($id);

        if (empty($depositDetail)) {
            Flash::error('Deposit Detail not found');

            return redirect(route('depositDetails.index'));
        }

        return view('deposit_details.show')->with('depositDetail', $depositDetail);
    }

    /**
     * Show the form for editing the specified DepositDetail.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $depositDetail = $this->depositDetailRepository->find($id);

        if (empty($depositDetail)) {
            Flash::error('Deposit Detail not found');

            return redirect(route('depositDetails.index'));
        }

        $deposits = \App\Models\Deposit::pluck('id','id');
        $users = \App\Models\User::pluck('name','id');

        return view('deposit_details.edit')->with(compact('depositDetail', 'deposits','users'));
    }

    /**
     * Update the specified DepositDetail in storage.
     *
     * @param int $id
     * @param UpdateDepositDetailRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDepositDetailRequest $request)
    {
        $depositDetail = $this->depositDetailRepository->find($id);

        if (empty($depositDetail)) {
            Flash::error('Deposit Detail not found');

            return redirect(route('depositDetails.index'));
        }

        $depositDetail = $this->depositDetailRepository->update($request->all(), $id);

        Flash::success('Deposit Detail updated successfully.');

        return redirect(route('depositDetails.index'));
    }

    /**
     * Remove the specified DepositDetail from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $depositDetail = $this->depositDetailRepository->find($id);

        if (empty($depositDetail)) {
            Flash::error('Deposit Detail not found');

            return redirect(route('depositDetails.index'));
        }

        $this->depositDetailRepository->delete($id);

        Flash::success('Deposit Detail deleted successfully.');

        return redirect(route('depositDetails.index'));
    }
}
