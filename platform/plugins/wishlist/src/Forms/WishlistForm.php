<?php

namespace Botble\Wishlist\Forms;

use Botble\Base\Forms\FormAbstract;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Wishlist\Http\Requests\WishlistRequest;
use Botble\Wishlist\Models\Wishlist;

class WishlistForm extends FormAbstract
{

    /**
     * {@inheritDoc}
     */
    public function buildForm()
    {
        $this
            ->setupModel(new Wishlist)
            ->setValidatorClass(WishlistRequest::class)
            ->withCustomFields()
            ->add('key', 'text', [
                'label'      => trans('plugins/wishlist::wishlist.key'),
                'label_attr' => ['class' => 'control-label required'],
                'attr'       => [
                    'placeholder'  => trans('plugins/wishlist::wishlist.key_placeholder'),
                    'data-counter' => 255,
                ],
            ])
            ->add('value', 'textarea', [
                'label'      => trans('plugins/wishlist::wishlist.value'),
                'label_attr' => ['class' => 'control-label'],
                'attr'       => [
                    'rows'         => 4,
                    'placeholder'  => trans('plugins/wishlist::wishlist.value_placeholder'),
                    'data-counter' => 512,
                ],
            ]);
    }
}
