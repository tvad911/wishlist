<?php

namespace Botble\Wishlist\Http\Controllers;

use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Wishlist\Http\Requests\WishlistShareRequest;
use Botble\Wishlist\Repositories\Interfaces\WishlistInterface;
use EmailHandler;
use Exception;
use Illuminate\Routing\Controller;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Slug\Repositories\Interfaces\SlugInterface;
use Botble\Wishlist\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Support\Arr;
use BaseHelper;

class PublicController extends Controller
{
    /**
     * @var WishlistInterface
     */
    protected $wishlistRepository;

    /**
     * @param WishlistInterface $wishlistRepository
     */
    public function __construct(WishlistInterface $wishlistRepository)
    {
        $this->wishlistRepository = $wishlistRepository;
    }

    /**
     * @param WishlistShareRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws \Throwable
     */
    public function postMakeWishlist(WishlistShareRequest $request, BaseHttpResponse $response)
    {
        try {
            $value = $request->value;
            $wishlist = $this->wishlistRepository->firstOrCreate(['value' => $value]);

            if($wishlist)
            {
                return $response->setData([
                                'url' => route('public.wishlist.share', ['key' => $wishlist->key]),
                            ])
                            ->setMessage(trans('plugins/wishlist::wishlist.message_success'));
            }
            else
            {
                return $response
                    ->setError()
                    ->setMessage(trans('plugins/wishlist::wishlist.message_failed'));
            }
        } catch (Exception $exception) {
            \Log::error($exception->getMessage());
            return $response
                ->setError()
                ->setMessage(trans('plugins/wishlist::wishlist.message_failed'));
        }
    }
}