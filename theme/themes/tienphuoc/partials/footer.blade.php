<!--FOOTER-->
            <div id="ci-footer">
                <div class="circleWrap c1"><i class="circle"></i></div>
                <div class="circleWrap c2"><i class="circle"></i></div>
                <div class="circleWrap c3"><i class="circle"></i></div>
                <div class="wrapper">
                    <div class="mainFoot cl-white">
                        @if (theme_option('logo'))
                        <div class="logo-foo d-none d-sm-block">
                            <a href="{{ route('public.single') }}"><img src="{{ RvMedia::getImageUrl(theme_option('alt_logo'))  }}" alt="{{ theme_option('site_name') }}" /></a>
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-xs-12 col-md-8 col-lg-9">
                                <div class="boxBottom addressFoot">
                                    <div class="row">
                                        <div class="col-12 col-sm-4">
                                            <h3 class="title">{{ __('Main office') }}</h3>
                                            <div class="content">
                                                <p>{{ theme_option('address') }}</p>
                                                <p>{{ theme_option('address_line2') }}</p>
                                                {{-- <p>{{ theme_option('hotline') }}</p>
                                                <p>{{ theme_option('email') }}</p> --}}
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <h3 class="title">{{ __('Trade office') }}</h3>
                                            <div class="content">
                                                <p>{{ theme_option('alt_address') }}</p>
                                                <p>{{ theme_option('alt_address_line2') }}</p>
                                                <p>{{ theme_option('alt_hotline') }}</p>
                                                <p>{{ theme_option('alt_email') }}</p>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-4">
                                            <h3 class="title">{{ __('Call center') }}</h3>
                                            <div class="content">
                                                <p>{{ theme_option('call_center_hotline') }}</p>
                                                <p>{{ theme_option('call_center_email') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--/address footer-->
                            <div class="col-xs-12 col-md-4 col-lg-3">
                                <div class="boxBottom">
                                    <div class="socialBox mb-3">
                                        @if(!empty(theme_option('facebook')))
                                            <a class="facebook" href="{{ theme_option('facebook') }}" target="_blank"><i class="mdi mdi-facebook-box"></i></a>
                                        @endif
                                        @if(!empty(theme_option('youtube')))
                                            <a class="youtube" href="{{ theme_option('youtube') }}" target="_blank"><i class="mdi mdi-youtube"></i></a>
                                        @endif
                                    </div>
                                    <h3 class="title">{{ __('Signup for newsletter') }}</h3>
                                    <div class="formNewsletter">
                                        <form action="{{ url('api/v1/subscribe/save') }}" class="subcribe-from">
                                            <div class="form-group">
                                                <input type="text" placeholder="{{ __('Name') }}" class="form-control" name="name"> </div>
                                            <div class="form-group">
                                                <input type="text" placeholder="{{ __('Email') }}" class="form-control" name="email"> </div>
                                            @if (setting('enable_captcha') && is_plugin_active('captcha'))
                                                <div class="form-group">
                                                    {!! Captcha::display([], ['lang' => app()->getLocale()]) !!}
                                                </div>
                                            @endif
                                            <div class="alert alert-success text-success text-left" style="display: none;">
                                                <span></span>
                                            </div>
                                            <div class="alert alert-danger text-danger text-left" style="display: none;">
                                                <span></span>
                                            </div>
                                            <div class="form-button">
                                                <button name="do_submit" type="submit" value="{{ __('Sign up') }}" class="button-web v1-1 send-btn"><span>{{ __('Sign up') }}</span> </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--/newsletter-->
                        </div>
                    </div>
                    <div class="botFoot text-center">
                        <div class="copyright">{!! clean(theme_option('copyright')) !!}</div>
                        <div class="footer-menu cl-white">
                            {!!
                                Menu::renderMenuLocation('footer-menu', [
                                    'options' => ['class' => ''],
                                    'view'    => 'menu-footer',
                                ])
                            !!}
                        </div>
                    </div>
                </div>
            </div>
        <!--/end footer-->
        </div>
    </div>

    <ul class="cl-white" id="buttonFixed">
        @if(!empty(theme_option('services_phone')) || !empty(theme_option('hotline_phone')))
        <li>
            <div class="txt collapse" id="hotline">
                @if(!empty(theme_option('hotline_phone')))
                <span>{{ __('Hotline:') }} <a href="tel:{{ theme_option('hotline_phone') }}">{{ theme_option('hotline_phone_text') }} {{ __('( Free )') }}</a></span>
                @endif
                @if(!empty(theme_option('services_phone')))
                <span>{{ __('Services:') }} <a href="tel:{{ theme_option('services_phone') }}">{{ theme_option('services_phone_text') }}</a></span>
                @endif
            </div>
            <span class="icon" data-toggle="collapse" href="#hotline" role="button" aria-expanded="false" aria-controls="hotline"><i class="mdi mdi-phone-classic"></i></span>
        </li>
        @endif
        @if(!empty(theme_option('brochue')))
        <li class="d-none d-lg-block">
            <a href="{{ theme_option('brochue') }}" target="_blank">
                <div class="txt">{{ __('Download brochue') }}</div>
                <span class="icon"><i class="mdi mdi-cloud-download"></i></span>
            </a>
        </li>
        @endif
    </ul>
    {!! do_shortcode('[wishlist-share][/wishlist-share]') !!}

    {!! Theme::footer() !!}
</body>

</html>