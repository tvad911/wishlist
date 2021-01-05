<?php

namespace Theme\ChangeInteraction\Http\Controllers;

use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Career\Models\Career;
use Botble\Career\Repositories\Interfaces\CareerInterface;
use Botble\Page\Repositories\Interfaces\PageInterface;
use Botble\RealEstate\Enums\ModerationStatusEnum;
use Botble\RealEstate\Enums\PropertyStatusEnum;
use Botble\RealEstate\Enums\PropertyTypeEnum;
use Botble\RealEstate\Models\Project;
use Botble\RealEstate\Models\Property;
use Botble\RealEstate\Repositories\Interfaces\CategoryInterface;
use Botble\RealEstate\Repositories\Interfaces\ProjectInterface;
use Botble\RealEstate\Repositories\Interfaces\PropertyInterface;
use Botble\Wishlist\Repositories\Interfaces\WishlistInterface;
use Botble\SeoHelper\SeoOpenGraph;
use Botble\Slug\Repositories\Interfaces\SlugInterface;
use Botble\Theme\Events\RenderingHomePageEvent;
use Botble\Theme\Http\Controllers\PublicController;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RvMedia;
use SeoHelper;
use SlugHelper;
use Theme;
use Theme\ChangeInteraction\Http\Resources\PostResource;
use Theme\ChangeInteraction\Http\Resources\PropertyResource;
use Botble\RealEstate\Models\Category;
use Botble\Services\Repositories\Interfaces\ServicesInterface;
use Botble\Services\Models\Services;
use Botble\Services\Enums\PersonelTypeEnum;
use Botble\Location\Repositories\Interfaces\StateInterface;
use Botble\Location\Models\State;
use Illuminate\Http\Response;

class FlexHomeController extends PublicController
{    

    /**
     * @param Request $request
     * @return Response
     */
    public function getWishlist(Request $request, PropertyInterface $propertyRepository)
    {
        SeoHelper::setTitle(__('Wishlist title'))
            ->setDescription(__('Wishlist description'));

        $cookieName = \Language::getCurrentLocale() . '_wishlist';
        $jsonWishlist = null;
        if(isset($_COOKIE[$cookieName]))
            $jsonWishlist = $_COOKIE[$cookieName];
        $list = null;

        if(!empty($jsonWishlist))
        {
            $arrValue = collect(json_decode($jsonWishlist, true))->flatten()->all();
            $list = $propertyRepository->advancedGet([
                'condition' => [
                    ['re_properties.id', 'IN', $arrValue]
                ],
                'order_by'  => [
                    're_properties.id' => 'DESC',
                ],
            ]);
        }

        Theme::breadcrumb()
            ->add(__('Home'), url('/'))
            ->add(__('Wishlist'));

        return Theme::scope('wishlist', compact('list'))->render();
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function getShareWishlist(string $key, Request $request, WishlistInterface $wishlistRepository, PropertyInterface $propertyRepository)
    {
        SeoHelper::setTitle(__('Share title'))
            ->setDescription(__('Share description'));


        $cookieName = \Language::getCurrentLocale() . '_wishlist';

        $list = null;
        $wishlist = $wishlistRepository->getFirstBy(['key' => $key]);
        $jsonWishlist = null;
        if(isset($_COOKIE[$cookieName]))
            $jsonWishlist = $_COOKIE[$cookieName];

        if($wishlist != null)
        {
            if(!empty($jsonWishlist)){
                $arrValue1 = collect(json_decode($jsonWishlist, true));
                $arrValue2 = collect(json_decode($wishlist->value, true));

                $arrValue = $arrValue1->merge($arrValue2)->unique();
                if(!empty(config('app.url')))
                {
                    $domain = parse_url(config('app.url'))['host'];
                }
                else
                {
                    $domain = null;
                }

                if (isset($_COOKIE[$cookieName])) {
                    unset($_COOKIE[$cookieName]);
                    setcookie($cookieName, '', time() - 3600, '/');
                }

                setcookie($cookieName, json_encode($arrValue), 60 * 24 * 60 * 60 * 1000, "/", $domain);

                return redirect()->route('public.wishlist');
            }
            else
            {
                $arrValue = collect(json_decode($wishlist->value, true))->all();
                if(!empty(config('app.url')))
                {
                    $domain = parse_url(config('app.url'))['host'];
                }
                else
                {
                    $domain = null;
                }

                if (isset($_COOKIE[$cookieName])) {
                    unset($_COOKIE[$cookieName]);
                    setcookie($cookieName, '', time() - 3600, '/');
                }

                setcookie($cookieName, json_encode($arrValue), 60 * 24 * 60 * 60 * 1000, "/", $domain);

                return redirect()->route('public.wishlist');
            }
        }
        else
        {
            return redirect()->route('public.wishlist');
        }
    }
}