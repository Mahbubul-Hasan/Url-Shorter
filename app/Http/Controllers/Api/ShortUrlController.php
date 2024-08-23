<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Traits\ResponseTrait;
use App\Http\Controllers\Controller;
use App\Http\Services\ShortUrl\ShortUrlService;
use App\Http\Resources\ShortUrl\ShortUrlResource;
use App\Http\Requests\ShortUrl\StoreShortUrlRequest;
use App\Http\Resources\ShortUrl\ShortUrlCollectionResource;

class ShortUrlController extends Controller {
    use ResponseTrait;
    /**
     * List of short link
     * @OA\GET(
     *      path="/api/url-short",
     *      summary="List of short link by specified user",
     *      description="",
     *      operationId="shortLinkList",
     *      tags={"Short Link"},
     *      security={ {"authToken": {} }},
     *      @OA\Parameter(
     *          name="user_id",
     *          required=true,
     *          in="query",
     *          example="2",
     *          explode=true,
     *          @OA\Schema(
     *              type="number"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(
     *                  type="array",
     *                  property="data",
     *                  @OA\Items(
     *                      type="object",
     *                  )
     *              )
     *
     *         )
     *      )
     * )
     */
    public function index(Request $request, ShortUrlService $service) {
        $shortUrl = $service->getDataBySpecifiedUser($request);

        return $this->responseJsonMessage('Short link list', Response::HTTP_OK, ShortUrlCollectionResource::collection($shortUrl));
    }

    /**
     * Create short link
     * @OA\Post(
     *      path="/api/url-short",
     *      summary="Create short link",
     *      description="",
     *      operationId="shortLink",
     *      tags={"Short Link"},
     *      security={ {"authToken": {} }},
     *      @OA\RequestBody(
     *          required=true,
     *          description="",
     *          @OA\JsonContent(
     *              required={"original_url"},
     *              @OA\Property(property="original_url", type="string", example="https: //exemple.com"),
     *              @OA\Property(property="url_code", type="string", example="Xyz123"),
     *              @OA\Property(property="expire", type="number", example="48"),
     *          ),
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Success",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Created successfully!")
     *         )
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="Wrong credentials response",
     *          @OA\JsonContent(
     *              @OA\Property(property="message", type="string", example="Something wrong. Please try again")
     *          )
     *      )
     * )
     */
    public function store(StoreShortUrlRequest $request, ShortUrlService $service) {
        try {
            $shortUrl = $service->saveRequest($request);
            return $this->responseJsonMessage('Url Generated Successfully!', Response::HTTP_OK, new ShortUrlResource($shortUrl));
        } catch (\Throwable $th) {
            return $this->responseJsonMessage($th->getMessage(), Response::HTTP_BAD_REQUEST, null, $th);
        }
    }
}
