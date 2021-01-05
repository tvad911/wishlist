<?php

namespace Botble\Wishlist\Models;

use Botble\Base\Traits\EnumCastable;
use Botble\Base\Enums\BaseStatusEnum;
use Botble\Base\Models\BaseModel;
use Illuminate\Support\Str;

class Wishlist extends BaseModel
{
    use EnumCastable;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'wishlists';

    /**
     * @var array
     */
    protected $fillable = [
        'value',
        'key'
    ];

    /**
     * @var array
     */
    protected $casts = [
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        // auto-sets values on creation
        static::creating(function ($query) {
            $query->key = Str::random(16);
        });
    }
}
