<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGameLogAPIRequest;
use App\Http\Requests\API\UpdateGameLogAPIRequest;
use App\Models\GameLog;
use App\Repositories\GameLogRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class GameLogController
 * @package App\Http\Controllers\API
 */

class GameLogAPIController extends AppBaseController
{
    /** @var  GameLogRepository */
    private $gameLogRepository;

    public function __construct(GameLogRepository $gameLogRepo)
    {
        $this->gameLogRepository = $gameLogRepo;
    }

    /**
     * Display a listing of the GameLog.
     * GET|HEAD /gameLogs
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $gameLogs = $this->gameLogRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($gameLogs->toArray(), 'Game Logs retrieved successfully');
    }

    /**
     * Store a newly created GameLog in storage.
     * POST /gameLogs
     *
     * @param CreateGameLogAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGameLogAPIRequest $request)
    {
        $input = $request->all();

        $gameLog = $this->gameLogRepository->create($input);

        return $this->sendResponse($gameLog->toArray(), 'Game Log saved successfully');
    }

    /**
     * Display the specified GameLog.
     * GET|HEAD /gameLogs/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var GameLog $gameLog */
        $gameLog = $this->gameLogRepository->find($id);

        if (empty($gameLog)) {
            return $this->sendError('Game Log not found');
        }

        return $this->sendResponse($gameLog->toArray(), 'Game Log retrieved successfully');
    }

    /**
     * Update the specified GameLog in storage.
     * PUT/PATCH /gameLogs/{id}
     *
     * @param int $id
     * @param UpdateGameLogAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGameLogAPIRequest $request)
    {
        $input = $request->all();

        /** @var GameLog $gameLog */
        $gameLog = $this->gameLogRepository->find($id);

        if (empty($gameLog)) {
            return $this->sendError('Game Log not found');
        }

        $gameLog = $this->gameLogRepository->update($input, $id);

        return $this->sendResponse($gameLog->toArray(), 'GameLog updated successfully');
    }

    /**
     * Remove the specified GameLog from storage.
     * DELETE /gameLogs/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var GameLog $gameLog */
        $gameLog = $this->gameLogRepository->find($id);

        if (empty($gameLog)) {
            return $this->sendError('Game Log not found');
        }

        $gameLog->delete();

        return $this->sendSuccess('Game Log deleted successfully');
    }
}
