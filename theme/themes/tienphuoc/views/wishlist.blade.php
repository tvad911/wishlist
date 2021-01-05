<div class="wrapCont wishlist-page">
    <!--box products-->
    <div class="boxSection boxCol productHome boxWishlist-page">
        <div class="wrapper">
            {!! Theme::partial('breadcrumb') !!}
            <div class="boxTitle">
                <h2 class="title">{{ __('Wishlist') }}</h2>
                <span class="line"></span>
            </div>
            <div class="boxContent view-col text-center">
                <div class="row">
                    @if(!empty($list) && $list->count())
                        @foreach ($list as $property)
                            <div class="col-6 col-md-4 item" data-id="{{ $property->id }}">
                                <div class="product rad5 w-shadow effectImg">
                                    <div class="imgWrap">
                                        <div class="img"><a href="{{ route('public.property', $property->slug) }}"><img src="{{ RvMedia::getImageUrl($property->image, 'small', false, RvMedia::getDefaultImage()) }}" src="{{ RvMedia::getImageUrl($property->image, 'small', false, RvMedia::getDefaultImage()) }}" alt="{{ $property->name }}" /></a></div>
                                        <button class="p-like active" data-id="{{ $property->id }}"><i class="mdi mdi-heart ico"></i></button>
                                    </div>
                                    <div class="info productAttr">
                                        <ul>
                                            <li><span class="i1">{{ $property->number_bedroom }} {{ __('bedrooms') }}</span></li>
                                            <li><span class="i2">{{ $property->number_bathroom }} {{ __('bathrooms') }}</span></li>
                                            <li><span class="i3">{{ $property->square }} {{ __('m2') }}</span></li>
                                        </ul>
                                    </div>
                                    <div class="caption">
                                        <h4 class="tend"><a href="{{ route('public.property', $property->slug) }}" title="Palm City">{{ $property->name }}</a></h4>
                                        <div class="location">{{ $property->location }}</div>
                                        <div class="price">{{ format_price($property->price, $property->currency) }} @if ($property->period) / {{ $property->period->toPlain() }} @endif</div>
                                        <div class="p-tool">
                                            <div class="p-share"><a class="button-web v2 share-click"><span><i class="mdi mdi-share-variant ico"></i></span></a>
                                                <div class="content-share">
                                                    <ul>
                                                        <li class="facebook">
                                                            <a href="https://www.facebook.com/sharer.php?u={{ route('public.property', $property->slug) }}" target="_blank"><img src="{{ asset('themes/tienphuoc/images/icon/facebook-icon.png') }}" alt="Facebook" /></a>
                                                        </li>
                                                        <li class="zalo">
                                                            <div class="zalo-share-button" data-href="{{ route('public.property', $property->slug) }}" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=false></div>
                                                        </li>
                                                        <li class="twitter">
                                                            <a class="share-tw" href="https://twitter.com/intent/tweet?url={{ route('public.property', $property->slug) }}" target="_blank"><img src="{{ asset('themes/tienphuoc/images/icon/twiter-icon.png') }}" alt="Twitter" /></a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="link"><a data-fancybox data-options='{"src": "#popup-appointment", "smallBtn" : true, "toolbar": false, "touch": false}' href="javascript:;" class="button-web v2 call-appointmentform" data-slug="{{ $property->slug }}" data-name="{{ $property->name }}" data-code="{{ $property->code }}"><span>{{ __('Make an appointment') }}</span></a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/end item-->
                        @endforeach
                    @else
                        <div class="no-result text-center">
                            <p class="message">{{ __('No item on wishlist') }}</p>
                        </div>
                    @endif
                </div>
                <div class="link-share-page pt-4">
                    <form action="{{ route('public.wishlist.make') }}" id="form-share-link">
                        @csrf
                        <a href="javascript:;" class="button-web v1-1 btn-share-now"><span>{{ __('Share now') }} <i class="mdi mdi-share-all"> </i></span></a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/box products-->
    <!--box tools-->
    <div class="boxSection boxTools text-center greyBg">
        <div class="wrapper">
            <div class="row">
                <div class="col-12 col-sm-4 item">
                    <div class="tool rad5 w-shadow">
                        <div class="iconWrap">
                            <div class="icon"><i class="mdi mdi-home"></i></div>
                        </div>
                        <h3 class="tend mt-2 mb-4"> {{ __('Real estate consignment') }}</h3>
                        <div class="link"><a data-fancybox data-options='{"src": "#popup-consignment", "smallBtn" : true, "toolbar": false, "touch": false}' href="javascript:;" class="button-web v1"><span>{{ __('Consignment now') }}</span></a></div>
                    </div>
                </div>
                <div class="col-12 col-sm-4 item">
                    <div class="tool rad5 w-shadow">
                        <div class="iconWrap">
                            <div class="icon"><i class="mdi mdi-email"></i></div>
                        </div>
                        <h3 class="tend mt-2 mb-4"> {{ __('Find a custom real estate') }} </h3>
                        <a data-fancybox data-options='{"src": "#popup-rent", "smallBtn" : true, "toolbar": false, "touch": false}' href="javascript:;" class="button-web v1"><span>{{ __('Find now') }}</span></a>
                    </div>
                </div>
                <div class="col-12 col-sm-4 item">
                    <div class="tool rad5 w-shadow">
                        <div class="iconWrap">
                            <div class="icon"><i class="mdi mdi-cart-plus"></i></div>
                        </div>
                        <h3 class="tend mt-2 mb-4"> {{ __('Register services') }}</h3>
                        <div class="link"><a data-fancybox data-options='{"src": "#popup-services", "smallBtn" : true, "toolbar": false, "touch": false}' href="javascript:;" class="button-web v1"><span>{{ __('Register now') }}</span></a></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/box tools-->
</div>