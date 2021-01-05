<?php

namespace Botble\Wishlist\Providers;

use Botble\Wishlist\Models\Wishlist;
use Illuminate\Support\ServiceProvider;
use Botble\Wishlist\Repositories\Caches\WishlistCacheDecorator;
use Botble\Wishlist\Repositories\Eloquent\WishlistRepository;
use Botble\Wishlist\Repositories\Interfaces\WishlistInterface;
use Botble\Base\Supports\Helper;
use Event;
use Botble\Base\Traits\LoadAndPublishDataTrait;
use Illuminate\Routing\Events\RouteMatched;

class WishlistServiceProvider extends ServiceProvider
{
    use LoadAndPublishDataTrait;

    public function register()
    {
        $this->app->bind(WishlistInterface::class, function () {
            return new WishlistCacheDecorator(new WishlistRepository(new Wishlist));
        });

        Helper::autoload(__DIR__ . '/../../helpers');
    }

    public function boot()
    {
        $this->setNamespace('plugins/wishlist')
            ->loadAndPublishConfigurations(['permissions'])
            ->loadMigrations()
            ->loadAndPublishTranslations()
            ->loadRoutes(['web']);

        Event::listen(RouteMatched::class, function () {
            if (defined('LANGUAGE_MODULE_SCREEN_NAME')) {
                //\Language::registerModule([Wishlist::class]);
            }

            dashboard_menu()->registerItem([
                'id'          => 'cms-plugins-wishlist',
                'priority'    => 20,
                'parent_id'   => null,
                'name'        => 'plugins/wishlist::wishlist.name',
                'icon'        => 'fa fa-list',
                'url'         => route('wishlist.index'),
                'permissions' => ['wishlist.index'],
            ]);
        });
    }
}
