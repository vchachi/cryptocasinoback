<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateGameDetailAPIRequest;
use App\Http\Requests\API\UpdateGameDetailAPIRequest;
use App\Models\GameDetail;
use App\Repositories\GameDetailRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class GameDetailController
 * @package App\Http\Controllers\API
 */

class GameDetailAPIController extends AppBaseController
{
    /** @var  GameDetailRepository */
    private $gameDetailRepository;

    public function __construct(GameDetailRepository $gameDetailRepo)
    {
        $this->gameDetailRepository = $gameDetailRepo;
    }

    /**
     * Display a listing of the GameDetail.
     * GET|HEAD /gameDetails
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $gameDetails = $this->gameDetailRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($gameDetails->toArray(), 'Game Details retrieved successfully');
    }

    /**
     * Store a newly created GameDetail in storage.
     * POST /gameDetails
     *
     * @param CreateGameDetailAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateGameDetailAPIRequest $request)
    {
        $input = $request->all();

        $gameDetail = $this->gameDetailRepository->create($input);

        return $this->sendResponse($gameDetail->toArray(), 'Game Detail saved successfully');
    }

    /**
     * Display the specified GameDetail.
     * GET|HEAD /gameDetails/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var GameDetail $gameDetail */
        $gameDetail = $this->gameDetailRepository->find($id);

        if (empty($gameDetail)) {
            return $this->sendError('Game Detail not found');
        }

        return $this->sendResponse($gameDetail->toArray(), 'Game Detail retrieved successfully');
    }

    /**
     * Update the specified GameDetail in storage.
     * PUT/PATCH /gameDetails/{id}
     *
     * @param int $id
     * @param UpdateGameDetailAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGameDetailAPIRequest $request)
    {
        $input = $request->all();

        /** @var GameDetail $gameDetail */
        $gameDetail = $this->gameDetailRepository->find($id);

        if (empty($gameDetail)) {
            return $this->sendError('Game Detail not found');
        }

        $gameDetail = $this->gameDetailRepository->update($input, $id);

        return $this->sendResponse($gameDetail->toArray(), 'GameDetail updated successfully');
    }

    /**
     * Remove the specified GameDetail from storage.
     * DELETE /gameDetails/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var GameDetail $gameDetail */
        $gameDetail = $this->gameDetailRepository->find($id);

        if (empty($gameDetail)) {
            return $this->sendError('Game Detail not found');
        }

        $gameDetail->delete();

        return $this->sendSuccess('Game Detail deleted successfully');
    }
}
