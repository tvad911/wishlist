<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=5, user-scalable=1" name="viewport"/>
    <link rel="canonical" href="{{ url('/') }}">

    <script type="text/javascript">
        var siteUrl = '{{ url('/') }}';
        var localeCode = '{{ Language::getCurrentLocaleCode() }}';
        var ref_lang = '{{ Language::getCurrentLocale() }}';
    </script>

    {!! Theme::header() !!}
</head>
<body @if (class_exists('Language', false) && Language::getCurrentLocaleRTL()) dir="rtl" @endif>
    <div id="ci-loading">
        <div class="img">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 263.6 255.1" style="enable-background:new 0 0 263.6 255.1;" xml:space="preserve">
                <g>
                    <path class="st0" d="M197.1,20.2L246.7,61v62.7h-77l-22.2,19.6V61L197.1,20.2 M197.1,0.4l-64.8,53.4v123.3l43.2-38.1H262V53.8
                            L197.1,0.4L197.1,0.4z" />
                    <g>
                        <path class="st1" d="M16.5,112.9c10,0,15,5.3,15,15.9v8.3c0,10.6-5,15.8-15,15.8h-4.8v24.1H1.7v-64.2H16.5z M11.7,122.1v21.8h4.8
                              c3.3,0,4.9-2,4.9-6.1v-9.6c0-4-1.6-6-4.9-6H11.7z" />
                        <path class="st1" d="M65.9,177.1c-0.3-1-0.6-1.9-0.7-2.6c-0.1-1.2-0.2-2.9-0.2-5.3v-10.1c0-5.5-2.2-8.2-6.6-8.2h-3.5v26.1H44.8
                              v-64.2H60c10,0,15,4.9,15,14.8v5.1c0,6.6-2.2,10.9-6.6,13c4.5,1.9,6.7,6.4,6.7,13.7v9.9c0,3.5,0.4,6.1,1.1,7.8H65.9z M54.9,122.1
                              v19.7h3.9c4.1,0,6.1-2.3,6.1-6.8v-6.3c0-4.4-1.7-6.6-5.1-6.6H54.9z" />
                        <path class="st1" d="M87.3,127.6c0-10.7,5.1-16.1,15.3-16.1c10.2,0,15.3,5.4,15.3,16.1V161c0,10.7-5.1,16.1-15.3,16.1
                              c-10.2,0-15.3-5.4-15.3-16.1V127.6z M97.4,161.6c0,4.2,1.7,6.4,5.2,6.4c3.5,0,5.2-2.1,5.2-6.4V127c0-4.2-1.7-6.3-5.2-6.3
                              c-3.5,0-5.2,2.1-5.2,6.3V161.6z" />
                        <path class="st1" d="M16.5,189.5c10,0,15,5.3,15,15.9v8.3c0,10.6-5,15.8-15,15.8h-4.8v24.1H1.7v-64.2H16.5z M11.7,198.7v21.8h4.8
                              c3.3,0,4.9-2,4.9-6.1v-9.6c0-4-1.6-6-4.9-6H11.7z" />
                        <path class="st1" d="M42.5,189.5h10.1v55h21.3v9.2H42.5V189.5z" />
                        <path class="st1" d="M97.4,189.5V239c0,4.2,1.7,6.3,5.2,6.3c3.5,0,5.2-2.1,5.2-6.3v-49.5h9.5v48.9c0,10.7-5,16.1-15,16.1
                              s-15-5.4-15-16.1v-48.9H97.4z" />
                        <path class="st1" d="M146.5,188.8c9.9,0,14.9,5.4,14.9,16.1v3.4h-9.5v-4c0-4.2-1.7-6.3-5.1-6.3c-3.4,0-5.1,2.1-5.1,6.3
                              c0,2.9,1,5.7,3.1,8.3c0.8,1,1.9,2.1,3.2,3.4l2.7,2.5c0.4,0.3,0.7,0.6,0.9,0.9c1.5,1.4,2.7,2.6,3.6,3.6c1.3,1.4,2.3,2.8,3.2,4.2
                              c2.1,3.3,3.1,7.1,3.1,11.2c0,10.7-5,16.1-15,16.1c-10,0-15-5.4-15-16.1v-6.2h9.5v6.9c0,4.2,1.7,6.3,5.2,6.3c3.5,0,5.2-2.1,5.2-6.3
                              c0-2.9-1-5.7-3-8.3c-0.8-1-1.9-2.2-3.2-3.4l-3.6-3.4c-1.5-1.4-2.7-2.6-3.6-3.6c-1.3-1.4-2.3-2.8-3.1-4.1
                              c-2.1-3.4-3.1-7.1-3.1-11.2C131.7,194.2,136.6,188.8,146.5,188.8z" />
                    </g>
                </g>
            </svg>
        </div>
    </div>

    <div id="ci-wrapper">
        <div id="ci-container">
            <div id="ci-header">
                <div class="sticker">
                    <div class="header-tools d-none d-lg-block">
                        <div class="wrapper">
                            <div class="socialBox text-center">
                                @if(!empty(theme_option('facebook')))
                                    <a class="facebook" href="{{ theme_option('facebook') }}" target="_blank"><i class="mdi mdi-facebook-box"></i></a>
                                @endif
                                @if(!empty(theme_option('youtube')))
                                    <a class="youtube" href="{{ theme_option('youtube') }}" target="_blank"><i class="mdi mdi-youtube"></i></a>
                                @endif
                            </div>
                            <div class="row-tool">
                                @if(!empty(theme_option('hotline')))
                                <div class="item">
                                    <div class="head-hotline">{{ __('Call us') }}: <a href="tel:{{ theme_option('hotline') }}">{{ theme_option('hotline_text') }}</a></div>
                                </div>
                                @endif
                                @if(!empty(theme_option('hotline_2')))
                                <div class="item">
                                    <a href="tel:{{ theme_option('hotline_2') }}">{{ theme_option('hotline_2_text') }}</a>
                                </div>
                                @endif
                                <div class="item">
                                    {!! Theme::partial('language-switcher') !!}
                                </div>
                                @if (is_plugin_active('blog'))
                                    <div class="item">
                                        <!--Search-->
                                        <div class="searchTool">
                                            <form class="quick-search" action="{{ route('public.search') }}">
                                                <div class="searchTop">
                                                    <div class="popup">
                                                        <button name="btn-search" type="submit" class="icon"></button>
                                                        <input type="text" class="form-control" name="q" placeholder="{{ __('Type to search...') }}">
                                                    </div>
                                                    <div class="icon btn-ico"></div>
                                                </div>
                                            </form>
                                        </div>
                                        <!--/end Search-->
                                    </div>
                                @endif
                                {{-- <div class="item">
                                    <div class="wishlist activation"><a href="{{ route('public.wishlist') }}"><i class="mdi mdi-heart-outline ico"></i><span class="count">0</span></a></div>
                                </div> --}}
                            </div>
                        </div>
                    </div>
                    <div class="header-top">
                        <div class="wrapper">
                            <div class="mainHead">
                                <div class="menu_mobile d-block d-lg-none">
                                    <div class="icon_menu"><span class="style_icon"></span></div>
                                </div>
                                {!! Theme::partial('language-switcher-mobile') !!}
                                <div class="logo">
                                    @if (theme_option('logo'))
                                        <a href="{{ route('public.single') }}"><img src="{{ RvMedia::getImageUrl(theme_option('logo')) }}" alt="{{ theme_option('site_name') }}" /></a>
                                    @endif
                                </div>
                                <div class="menuWrap">
                                    <div class="overlay"></div>
                                    <div class="menuNav">
                                        {!!
                                            Menu::renderMenuLocation('main-menu', [
                                                'options' => ['class' => ''],
                                                'view'    => 'menu',
                                            ])
                                        !!}
                                        <div class="wishlist-mb mb activation d-block d-lg-none">
                                            <a href="{{ route('public.wishlist') }}"><span class="txt">{{ __('Wishlist') }}</span> <span class="count">(0)</span></a>
                                        </div>
                                        <!--Search-->
                                        <div class="searchTool d-block d-lg-none">
                                            <div class="searchTop">
                                                <input type="text" id="txtSearch" name="keyword" placeholder="{{ __('Search') }}">
                                                <button name="btn-search" type="submit" class="icon"></button>
                                            </div>
                                        </div>
                                        <!--/end Search-->
                                    </div>
                                    <div class="wishlist activation d-none d-lg-block">
                                        <a href="{{ route('public.wishlist') }}"><i class="mdi mdi-heart-outline ico"></i><span class="count">0</span></a>
                                    </div>
                                    <div class="tool-advisory">
                                        <div class="link-tool">
                                            <a data-toggle="collapse" href="#_advisory" role="button" aria-expanded="false" aria-controls="_advisory" class="button-web v1"><span class="txt">{{ __('Support') }}</span></a>
                                        </div>
                                        <ul class="collapse" id="_advisory">
                                            <li>
                                                <a data-fancybox data-options='{"src": "#popup-consignment", "smallBtn" : true, "toolbar": false, "touch": false}' href="javascript:;">{{ __('Real estate consignment') }}</a>
                                            </li>
                                            <li>
                                                <a data-fancybox data-options='{"src": "#popup-appointment", "smallBtn" : true, "toolbar": false, "touch": false}' href="javascript:;" class="call-appointment-popup">{{ __('Make an appointment') }}</a>
                                            </li>
                                            <li>
                                                <a data-fancybox data-options='{"src": "#popup-rent", "smallBtn" : true, "toolbar": false, "touch": false}' href="javascript:;">{{ __('Find a custom real estate') }}</a>
                                            </li>
                                            <li>
                                                <a data-fancybox data-options='{"src": "#popup-services", "smallBtn" : true, "toolbar": false, "touch": false}' href="javascript:;">{{ __('Register services') }}</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/end header-->