<?php

namespace Botble\Wishlist\Tables;

use Auth;
use BaseHelper;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Wishlist\Repositories\Interfaces\WishlistInterface;
use Botble\Table\Abstracts\TableAbstract;
use Illuminate\Contracts\Routing\UrlGenerator;
use Yajra\DataTables\DataTables;
use Botble\Wishlist\Models\Wishlist;
use Html;
use Illuminate\Support\Str;

class WishlistTable extends TableAbstract
{

    /**
     * @var bool
     */
    protected $hasActions = true;

    /**
     * @var bool
     */
    protected $hasFilter = true;

    /**
     * WishlistTable constructor.
     * @param DataTables $table
     * @param UrlGenerator $urlGenerator
     * @param WishlistInterface $wishlistRepository
     */
    public function __construct(DataTables $table, UrlGenerator $urlGenerator, WishlistInterface $wishlistRepository)
    {
        $this->repository = $wishlistRepository;
        $this->setOption('id', 'plugins-wishlist-table');
        parent::__construct($table, $urlGenerator);

        if (!Auth::user()->hasAnyPermission(['wishlist.edit', 'wishlist.destroy'])) {
            $this->hasOperations = false;
            $this->hasActions = false;
        }
    }

    /**
     * {@inheritDoc}
     */
    public function ajax()
    {
        $data = $this->table
            ->eloquent($this->query())
            ->editColumn('key', function ($item) {
                return Html::link(route('wishlist.edit', $item->id), $item->key);
            })
            ->editColumn('value', function ($item) {
                return Str::words($item->value, 128, '...');
            })
            ->editColumn('checkbox', function ($item) {
                return $this->getCheckbox($item->id);
            })
            ->editColumn('created_at', function ($item) {
                return BaseHelper::formatDate($item->created_at);
            });

        return apply_filters(BASE_FILTER_GET_LIST_DATA, $data, $this->repository->getModel())
            ->addColumn('operations', function ($item) {
                return $this->getOperations('wishlist.edit', 'wishlist.destroy', $item);
            })
            ->escapeColumns([])
            ->make(true);
    }

    /**
     * {@inheritDoc}
     */
    public function query()
    {
        $model = $this->repository->getModel();
        $select = [
            'wishlists.id',
            'wishlists.value',
            'wishlists.key',
            'wishlists.created_at',
        ];

        $query = $model->select($select);

        return $this->applyScopes(apply_filters(BASE_FILTER_TABLE_QUERY, $query, $model, $select));
    }

    /**
     * {@inheritDoc}
     */
    public function columns()
    {
        return [
            'id' => [
                'name'  => 'wishlists.id',
                'title' => trans('core/base::tables.id'),
                'width' => '20px',
            ],
            'key' => [
                'name'  => 'wishlists.key',
                'title' => trans('plugins/wishlist::wishlist.key'),
                'class' => 'text-left',
            ],
            'value' => [
                'name'  => 'wishlists.value',
                'title' => trans('plugins/wishlist::wishlist.value'),
                'class' => 'text-left',
            ],
            'created_at' => [
                'name'  => 'wishlists.created_at',
                'title' => trans('core/base::tables.created_at'),
                'width' => '100px',
            ]
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function buttons()
    {
        $buttons = $this->addCreateButton(route('wishlist.create'), 'wishlist.create');

        return apply_filters(BASE_FILTER_TABLE_BUTTONS, $buttons, Wishlist::class);
    }

    /**
     * {@inheritDoc}
     */
    public function bulkActions(): array
    {
        return $this->addDeleteAction(route('wishlist.deletes'), 'wishlist.destroy', parent::bulkActions());
    }

    /**
     * {@inheritDoc}
     */
    public function getBulkChanges(): array
    {
        return [
            'wishlists.key' => [
                'title'    => trans('plugins/wishlist::wishlist.key'),
                'type'     => 'text',
                'validate' => 'required|max:120',
            ],
            'wishlists.created_at' => [
                'title' => trans('core/base::tables.created_at'),
                'type'  => 'date',
            ],
        ];
    }

    /**
     * @return array
     */
    public function getFilters(): array
    {
        return $this->getBulkChanges();
    }
}
