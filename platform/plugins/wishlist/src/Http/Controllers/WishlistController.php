<?php

namespace Botble\Wishlist\Http\Controllers;

use Botble\Base\Events\BeforeEditContentEvent;
use Botble\Wishlist\Http\Requests\WishlistRequest;
use Botble\Wishlist\Repositories\Interfaces\WishlistInterface;
use Botble\Base\Http\Controllers\BaseController;
use Illuminate\Http\Request;
use Exception;
use Botble\Wishlist\Tables\WishlistTable;
use Botble\Base\Events\CreatedContentEvent;
use Botble\Base\Events\DeletedContentEvent;
use Botble\Base\Events\UpdatedContentEvent;
use Botble\Base\Http\Responses\BaseHttpResponse;
use Botble\Wishlist\Forms\WishlistForm;
use Botble\Base\Forms\FormBuilder;

class WishlistController extends BaseController
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
     * @param WishlistTable $table
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function index(WishlistTable $table)
    {
        page_title()->setTitle(trans('plugins/wishlist::wishlist.name'));

        return $table->renderTable();
    }

    /**
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function create(FormBuilder $formBuilder)
    {
        page_title()->setTitle(trans('plugins/wishlist::wishlist.create'));

        return $formBuilder->create(WishlistForm::class)->renderForm();
    }

    /**
     * @param WishlistRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function store(WishlistRequest $request, BaseHttpResponse $response)
    {
        $wishlist = $this->wishlistRepository->createOrUpdate($request->input());

        event(new CreatedContentEvent(WISHLIST_MODULE_SCREEN_NAME, $request, $wishlist));

        return $response
            ->setPreviousUrl(route('wishlist.index'))
            ->setNextUrl(route('wishlist.edit', $wishlist->id))
            ->setMessage(trans('core/base::notices.create_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param FormBuilder $formBuilder
     * @return string
     */
    public function edit($id, FormBuilder $formBuilder, Request $request)
    {
        $wishlist = $this->wishlistRepository->findOrFail($id);

        event(new BeforeEditContentEvent($request, $wishlist));

        page_title()->setTitle(trans('plugins/wishlist::wishlist.edit') . ' "' . $wishlist->key . '"');

        return $formBuilder->create(WishlistForm::class, ['model' => $wishlist])->renderForm();
    }

    /**
     * @param $id
     * @param WishlistRequest $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function update($id, WishlistRequest $request, BaseHttpResponse $response)
    {
        $wishlist = $this->wishlistRepository->findOrFail($id);

        $wishlist->fill($request->input());

        $this->wishlistRepository->createOrUpdate($wishlist);

        event(new UpdatedContentEvent(WISHLIST_MODULE_SCREEN_NAME, $request, $wishlist));

        return $response
            ->setPreviousUrl(route('wishlist.index'))
            ->setMessage(trans('core/base::notices.update_success_message'));
    }

    /**
     * @param $id
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     */
    public function destroy(Request $request, $id, BaseHttpResponse $response)
    {
        try {
            $wishlist = $this->wishlistRepository->findOrFail($id);

            $this->wishlistRepository->delete($wishlist);

            event(new DeletedContentEvent(WISHLIST_MODULE_SCREEN_NAME, $request, $wishlist));

            return $response->setMessage(trans('core/base::notices.delete_success_message'));
        } catch (Exception $exception) {
            return $response
                ->setError()
                ->setMessage($exception->getMessage());
        }
    }

    /**
     * @param Request $request
     * @param BaseHttpResponse $response
     * @return BaseHttpResponse
     * @throws Exception
     */
    public function deletes(Request $request, BaseHttpResponse $response)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return $response
                ->setError()
                ->setMessage(trans('core/base::notices.no_select'));
        }

        foreach ($ids as $id) {
            $wishlist = $this->wishlistRepository->findOrFail($id);
            $this->wishlistRepository->delete($wishlist);
            event(new DeletedContentEvent(WISHLIST_MODULE_SCREEN_NAME, $request, $wishlist));
        }

        return $response->setMessage(trans('core/base::notices.delete_success_message'));
    }
}
