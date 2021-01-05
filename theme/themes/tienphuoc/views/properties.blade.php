@php
    use Botble\Base\Enums\BaseStatusEnum;
    use Botble\RealEstate\Enums\ProjectStatusEnum;

    $states = collect([]);
    $projects = collect([]);
    $categories = collect([]);
    if (is_plugin_active('location')) {
        $states = frontend_get_all_state(['status' => BaseStatusEnum::PUBLISHED]);
    }
    if (is_plugin_active('real-estate')) {
        $projects = frontend_get_all_project([['status', 'NOT_IN', [ProjectStatusEnum::NOT_AVAILABLE]]]);
        $categories = frontend_get_all_realestate_category(['status' => BaseStatusEnum::PUBLISHED]);
    }
@endphp
<div class="wrapCont page-properties">
    <div class="wrapper">
        <div class="boxSection boxCol reverse boxProd-page">
            <div class="row">
                <div class="col-full" id="main-col">
                    {!! Theme::partial('breadcrumb') !!}
                    <div class="quickFilter">
                        <div class="result-filter">
                            <h4 class="txt-result">{{ __('Property available') }} <span>{{ $properties->total() }}</span></h4>
                            <div class="filter-selected">
                                @if($state_id = request()->input('state_id'))
                                    @if(!empty($states) && isset($states[$state_id]))
                                        <div class="item" data-remove="state_id"><i class="mdi mdi-close-circle-outline"></i> {{ $states[$state_id] }} </div>
                                    @endif
                                @endif
                                @if($category_id = request()->input('category_id'))
                                    @if(!empty($categories) && isset($categories[$category_id]))
                                        <div class="item" data-remove="category_id"><i class="mdi mdi-close-circle-outline"></i> {{ $categories[$category_id] }}</div>
                                    @endif
                                @endif
                            </div>
                        </div>
                        <div class="sort-list">
                            <div class="dropdown-list">
                                <select name="sort-product" class="form-control">
                                    <option value="">{{ __('Price') }}</option>
                                    <option value="asc" @if(request()->input('order_by') == 'asc') selected="selected" @endif>{{ __('Asc') }}</option>
                                    <option value="desc" @if(request()->input('order_by') == 'desc') selected="selected" @endif>{{ __('Desc') }}</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="list-items list-prods">
                        @if($properties->count())
                        <div class="row">
                            @foreach ($properties as $property)
                            <div class="col-12 item">
                                <div class="product rad5 w-shadow effectImg">
                                    <div class="imgWrap">
                                        <div class="img rad5"><img src="{{ RvMedia::getImageUrl($property->image, 'small', false, RvMedia::getDefaultImage()) }}" src="{{ RvMedia::getImageUrl($property->image, 'small', false, RvMedia::getDefaultImage()) }}" alt="{{ $property->name }}" /></div>
                                        <button class="p-like addWishlist" data-id="{{ $property->id }}"><i class="mdi mdi-heart ico"></i></button>
                                        <a href="{{ route('public.property', $property->slug) }}" class="p-link"></a>
                                    </div>
                                    <div class="caption">
                                        <h2 class="tend"><a href="{{ route('public.property', $property->slug) }}">{{ $property->name }}</a></h2>
                                        <div class="location">{{ $property->location }}</div>
                                        <div class="des">{{ $property->description }}</div>
                                        <div class="info productAttr">
                                            <ul>
                                                <li><span class="i1">{{ $property->number_bedroom }} {{ __('bedrooms') }}</span></li>
                                                <li><span class="i2">{{ $property->number_bathroom }} {{ __('bathrooms') }}</span></li>
                                                <li><span class="i3">{{ $property->square }} {{ __('m2') }}</span></li>
                                            </ul>
                                        </div>
                                        <div class="p-tool">
                                            <div class="link"><a data-fancybox data-options='{"src": "#popup-appointment", "smallBtn" : true, "toolbar": false, "touch": false}' href="javascript:;" class="button-web v2 call-appointmentform" data-slug="{{ $property->slug }}" data-name="{{ $property->name }}" data-code="{{ $property->code }}"><span>{{ __('Make an appointment') }}</span></a></div>
                                            <div class="price">{{ format_price($property->price, $property->currency) }} @if ($property->period) / {{ $property->period->toPlain() }} @endif</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/end item-->
                            @endforeach
                        </div>
                        @else
                            <div class="no-result text-center">
                                <p class="message">{{ __('If the result is not found. Please leave your contact, we will contact you soon') }}</p>
                                <div class="link">
                                    <a data-fancybox data-options='{"src": "#popup-rent", "smallBtn" : true, "toolbar": false, "touch": false}' href="javascript:;" class="button-web v1-1"><span>{{ __('Find a custom') }}</span></a>
                                </div>
                            </div>
                        @endif

                        {!! $properties->appends(request()->query())->links() !!}
                    </div>
                </div>
                <div class="col-full aside" id="sidebar-l">
                    {!! dynamic_sidebar('list_property_sidebar') !!}
                </div>
            </div>
            <!--end list product-->
        </div>
    </div>
</div>