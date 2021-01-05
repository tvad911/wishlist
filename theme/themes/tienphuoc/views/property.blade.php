<div class="wrapCont property-post">
    <div class="wrapper">
        {!! Theme::partial('breadcrumb') !!}
        <div class="box-detailPro">
            <div class="productWrap">
                <h1 class="title">{{ $property->name }}</h1>
                <div class="list-items">
                    <div class="info productAttr">
                        <ul>
                            <li><span class="i1">{{ $property->number_bedroom }} {{ __('bedrooms') }}</span></li>
                            <li><span class="i2">{{ $property->number_bathroom }} {{ __('bathrooms') }}</span></li>
                            <li><span class="i3">{{ $property->square }} {{ __('m2') }}</span></li>
                        </ul>
                    </div>
                    <div class="price">
                        {{ format_price($property->price, $property->currency) }} @if ($property->period) / {{ $property->period->toPlain() }} @endif
                    </div>
                </div>
                <div class="productThumbnail">
                    <div class="row">
                        <div class="col-12 col-sm-6 item main-img">
                            <a href="{{ RvMedia::getImageUrl($property->image, null, false, RvMedia::getDefaultImage()) }}" data-fancybox="gallery" data-caption="{{ $property->name }}">
                                <div class="imgWrap effectImg">
                                    <div class="img rad5"><img src="{{ RvMedia::getImageUrl($property->image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $property->name }}" />
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-sm-6 item small-img">
                            <div class="row">
                                @foreach($property->images as $image)
                                    @if($loop->index != 0 && $loop->index <= 4)
                                        <div class="col-6 item">
                                            <a href="{{ RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage()) }}" data-fancybox="gallery" data-caption="{{ $property->name }}">
                                                <div class="imgWrap effectImg">
                                                    <div class="img rad5">
                                                        <img src="{{ RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage()) }}" alt="{{ $property->name }}" />
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="showAll rad5">
                        @foreach($property->images as $image)
                            @if($loop->index > 4)
                                <a href="{{ RvMedia::getImageUrl($image, null, false, RvMedia::getDefaultImage()) }}" data-fancybox="gallery" data-caption="{{ $property->name }}">{{ __('Show all') }}</a>
                            @endif
                        @endforeach
                    </div>
                </div>
                <div class="p-tool">
                    <button class="p-like addWishlist" data-id="{{ $property->id }}"><i class="mdi mdi-heart ico"></i>{{ __('Interested') }}</button>
                    <div class="p-share"><a class="share-click"><span><i class="mdi mdi-share-variant ico"></i>{{ __('Share') }}</span></a>
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
                </div>
            </div>
            <!--info detail product-->
            <div id="sticky-anchor"></div>
            <div class="productContent boxCol">
                <div class="row">
                    <div class="col-full colFix" id="main-col">
                        <div class="panel-group v1" id="accordion">
                            <div class="panel">
                                <div class="panel-heading">
                                    <button class="panel-title" data-toggle="collapse" data-target="#panel1" aria-expanded="false">{{ __('Overview') }}</button>
                                </div>
                                <div id="panel1" class="collapse">
                                    <div class="panel-body">
                                        <div class="the-content desc">
                                            <p>{!! $property->description !!}</p>
                                            <div class="prod-att-detail">
                                                <ul>
                                                    @if ($property->category->name)
                                                        <li>
                                                            <span class="txt">{{ __('Category') }}</span>
                                                            <span class="info">{{ $property->category->name }}</span>
                                                        </li>
                                                    @endif
                                                    @if ($property->square)
                                                        <li>
                                                            <span class="txt">{{ __('Square') }}</span>
                                                            <span class="info">{{ $property->square }} {{ __('m2') }}</span>
                                                        </li>
                                                    @endif
                                                    @if ($property->floor)
                                                        <li>
                                                            <span class="txt">{{ __('Floor') }}</span>
                                                            <span class="info">{{ $property->floor }}</span>
                                                        </li>
                                                    @endif
                                                    @if ($property->number_bedroom)
                                                        <li>
                                                            <span class="txt">{{ __('Number of bedrooms') }}</span>
                                                            <span class="info">{{ $property->number_bedroom }}</span>
                                                        </li>
                                                    @endif
                                                    @if ($property->project)
                                                        <li>
                                                            <span class="txt">{{ __('Project') }}</span>
                                                            <span class="info">@if($property->project->slug) <a href="{{ route('public.project', ['slug' => $property->project->slug]) }}" target="_blank">{{ $property->project->name }}</a>@endif</span>
                                                        </li>
                                                    @endif
                                                    @if ($property->number_bathroom)
                                                        <li>
                                                            <span class="txt">{{ __('Number of bathrooms') }}</span>
                                                            <span class="info">{{ $property->number_bathroom }}</span>
                                                        </li>
                                                    @endif
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($property->features->count())
                            <div class="panel">
                                <div class="panel-heading">
                                    <button class="panel-title" data-toggle="collapse" data-target="#panel2" aria-expanded="false">{{ __('Features') }}</button>
                                </div>
                                <div id="panel2" class="collapse">
                                    <div class="panel-body">
                                        <div class="the-content desc">
                                             @if($property->content)
                                                {!! $property->content !!}
                                            @endif
                                            <div class="prod-att-detail">
                                                <ul>
                                                    @foreach($property->features as $feature)
                                                        <li>
                                                            <span class="txt">{{ $feature->name }}</span>
                                                            <span class="info">{{ __('Yes') }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @if ($property->video)
                                <div class="panel">
                                    <div class="panel-heading">
                                        <button class="panel-title" data-toggle="collapse" data-target="#panel3" aria-expanded="false">{{ __('Video') }}</button>
                                    </div>
                                    <div id="panel3" class="collapse">
                                        <div class="panel-body">
                                            <div class="the-content desc">
                                                <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/{{ $property->video }}" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="panel">
                                <div class="panel-heading">
                                    <button class="panel-title" data-toggle="collapse" data-target="#panel4" aria-expanded="false">{{ __('Map') }}</button>
                                </div>
                                <div id="panel4" class="collapse">
                                    <div class="panel-body">
                                        <div class="the-content desc">
                                            <div id="map">
                                                <iframe id="gmap_canvas" width="100%" height="500" src="https://maps.google.com/maps?q={{ urlencode($property->location) }}%20&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- {!! Theme::partial('share', ['title' => __('Share this property'), 'description' => $property->description]) !!} --}}
                        </div>
                        <!--/panel-->
                    </div>
                    <div class="col-full aside">
                        {!! dynamic_sidebar('property_sidebar') !!}
                    </div>
                </div>
            </div>
            <!--/info detail product-->
        </div>
    </div>
    <div id="limited"></div>
    <!--slide product-->
    {!! do_shortcode('[featured-properties type="related" property_id='. $property->id .'][/featured-properties]') !!}
    <!--/slide product-->
</div>