<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateWithdrawLogRequest;
use App\Http\Requests\UpdateWithdrawLogRequest;
use App\Repositories\WithdrawLogRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class WithdrawLogController extends AppBaseController
{
    /** @var WithdrawLogRepository $withdrawLogRepository*/
    private $withdrawLogRepository;

    public function __construct(WithdrawLogRepository $withdrawLogRepo)
    {
        $this->withdrawLogRepository = $withdrawLogRepo;
    }

    /**
     * Display a listing of the WithdrawLog.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $withdrawLogs = $this->withdrawLogRepository->all();

        return view('withdraw_logs.index')
            ->with('withdrawLogs', $withdrawLogs);
    }

    /**
     * Show the form for creating a new WithdrawLog.
     *
     * @return Response
     */
    public function create()
    {
        $withdraws = \App\Models\Withdraw::pluck('id','id');
        $users = \App\Models\User::pluck('name','id');

        return view('withdraw_logs.create')->with(compact('withdraws','users'));
    }

    /**
     * Store a newly created WithdrawLog in storage.
     *
     * @param CreateWithdrawLogRequest $request
     *
     * @return Response
     */
    public function store(CreateWithdrawLogRequest $request)
    {
        $input = $request->all();

        $withdrawLog = $this->withdrawLogRepository->create($input);

        Flash::success('Withdraw Log saved successfully.');

        return redirect(route('withdrawLogs.index'));
    }

    /**
     * Display the specified WithdrawLog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $withdrawLog = $this->withdrawLogRepository->find($id);

        if (empty($withdrawLog)) {
            Flash::error('Withdraw Log not found');

            return redirect(route('withdrawLogs.index'));
        }

        return view('withdraw_logs.show')->with('withdrawLog', $withdrawLog);
    }

    /**
     * Show the form for editing the specified WithdrawLog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $withdrawLog = $this->withdrawLogRepository->find($id);

        if (empty($withdrawLog)) {
            Flash::error('Withdraw Log not found');

            return redirect(route('withdrawLogs.index'));
        }
        
        $withdraws = \App\Models\Withdraw::pluck('id','id');
        $users = \App\Models\User::pluck('name','id');

        return view('withdraw_logs.edit')->with(compact('withdrawLog', 'withdraws','users'));
    }

    /**
     * Update the specified WithdrawLog in storage.
     *
     * @param int $id
     * @param UpdateWithdrawLogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateWithdrawLogRequest $request)
    {
        $withdrawLog = $this->withdrawLogRepository->find($id);

        if (empty($withdrawLog)) {
            Flash::error('Withdraw Log not found');

            return redirect(route('withdrawLogs.index'));
        }

        $withdrawLog = $this->withdrawLogRepository->update($request->all(), $id);

        Flash::success('Withdraw Log updated successfully.');

        return redirect(route('withdrawLogs.index'));
    }

    /**
     * Remove the specified WithdrawLog from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $withdrawLog = $this->withdrawLogRepository->find($id);

        if (empty($withdrawLog)) {
            Flash::error('Withdraw Log not found');

            return redirect(route('withdrawLogs.index'));
        }

        $this->withdrawLogRepository->delete($id);

        Flash::success('Withdraw Log deleted successfully.');

        return redirect(route('withdrawLogs.index'));
    }
}
