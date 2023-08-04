<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCryptoAPIRequest;
use App\Http\Requests\API\UpdateCryptoAPIRequest;
use App\Models\Crypto;
use App\Repositories\CryptoRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CryptoController
 * @package App\Http\Controllers\API
 */

class CryptoAPIController extends AppBaseController
{
    /** @var  CryptoRepository */
    private $cryptoRepository;

    public function __construct(CryptoRepository $cryptoRepo)
    {
        $this->cryptoRepository = $cryptoRepo;
    }

    /**
     * Display a listing of the Crypto.
     * GET|HEAD /cryptos
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $cryptos = $this->cryptoRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($cryptos->toArray(), 'Cryptos retrieved successfully');
    }

    /**
     * Store a newly created Crypto in storage.
     * POST /cryptos
     *
     * @param CreateCryptoAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCryptoAPIRequest $request)
    {
        $input = $request->all();

        $crypto = $this->cryptoRepository->create($input);

        return $this->sendResponse($crypto->toArray(), 'Crypto saved successfully');
    }

    /**
     * Display the specified Crypto.
     * GET|HEAD /cryptos/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Crypto $crypto */
        $crypto = $this->cryptoRepository->find($id);

        if (empty($crypto)) {
            return $this->sendError('Crypto not found');
        }

        return $this->sendResponse($crypto->toArray(), 'Crypto retrieved successfully');
    }

    /**
     * Update the specified Crypto in storage.
     * PUT/PATCH /cryptos/{id}
     *
     * @param int $id
     * @param UpdateCryptoAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCryptoAPIRequest $request)
    {
        $input = $request->all();

        /** @var Crypto $crypto */
        $crypto = $this->cryptoRepository->find($id);

        if (empty($crypto)) {
            return $this->sendError('Crypto not found');
        }

        $crypto = $this->cryptoRepository->update($input, $id);

        return $this->sendResponse($crypto->toArray(), 'Crypto updated successfully');
    }

    /**
     * Remove the specified Crypto from storage.
     * DELETE /cryptos/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Crypto $crypto */
        $crypto = $this->cryptoRepository->find($id);

        if (empty($crypto)) {
            return $this->sendError('Crypto not found');
        }

        $crypto->delete();

        return $this->sendSuccess('Crypto deleted successfully');
    }
}
