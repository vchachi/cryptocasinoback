<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGameLogRequest;
use App\Http\Requests\UpdateGameLogRequest;
use App\Repositories\GameLogRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class GameLogController extends AppBaseController
{
    /** @var GameLogRepository $gameLogRepository*/
    private $gameLogRepository;

    public function __construct(GameLogRepository $gameLogRepo)
    {
        $this->gameLogRepository = $gameLogRepo;
    }

    /**
     * Display a listing of the GameLog.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $gameLogs = $this->gameLogRepository->all();

        return view('game_logs.index')
            ->with('gameLogs', $gameLogs);
    }

    /**
     * Show the form for creating a new GameLog.
     *
     * @return Response
     */
    public function create()
    {
        $game_details = \App\Models\GameDetail::pluck('id','id');

        return view('game_logs.create')->with(compact('game_details'));
    }

    /**
     * Store a newly created GameLog in storage.
     *
     * @param CreateGameLogRequest $request
     *
     * @return Response
     */
    public function store(CreateGameLogRequest $request)
    {
        $input = $request->all();

        $gameLog = $this->gameLogRepository->create($input);

        Flash::success('Game Log saved successfully.');

        return redirect(route('gameLogs.index'));
    }

    /**
     * Display the specified GameLog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gameLog = $this->gameLogRepository->find($id);

        if (empty($gameLog)) {
            Flash::error('Game Log not found');

            return redirect(route('gameLogs.index'));
        }

        return view('game_logs.show')->with('gameLog', $gameLog);
    }

    /**
     * Show the form for editing the specified GameLog.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gameLog = $this->gameLogRepository->find($id);

        if (empty($gameLog)) {
            Flash::error('Game Log not found');

            return redirect(route('gameLogs.index'));
        }

        $game_details = \App\Models\GameDetail::pluck('id','id');

        return view('game_logs.edit')->with(compact('gameLog', 'game_details'));
    }

    /**
     * Update the specified GameLog in storage.
     *
     * @param int $id
     * @param UpdateGameLogRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGameLogRequest $request)
    {
        $gameLog = $this->gameLogRepository->find($id);

        if (empty($gameLog)) {
            Flash::error('Game Log not found');

            return redirect(route('gameLogs.index'));
        }

        $gameLog = $this->gameLogRepository->update($request->all(), $id);

        Flash::success('Game Log updated successfully.');

        return redirect(route('gameLogs.index'));
    }

    /**
     * Remove the specified GameLog from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gameLog = $this->gameLogRepository->find($id);

        if (empty($gameLog)) {
            Flash::error('Game Log not found');

            return redirect(route('gameLogs.index'));
        }

        $this->gameLogRepository->delete($id);

        Flash::success('Game Log deleted successfully.');

        return redirect(route('gameLogs.index'));
    }
}
