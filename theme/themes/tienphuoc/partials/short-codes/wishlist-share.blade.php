<div id="popup-wishlist-share" class="tool-popup rad5" style="display: none">
    <div class="boxTitle">
        <h3 class="title">{{ __('Share link') }}</h3>
    </div>
    <div class="content">
        <div class="frToolWeb">
            <div class="form-group d-flex align-items-center">
                <input type="input" name="link_share" class="form-control" id="link-share" value="">
                <button class="btncopy"> <i class="mdi mdi-content-copy"></i>{{ __('Copy') }}</button>
            </div>
            <div class="page-share pt-2">
                <ul class="d-flex">
                    <li class="facebook">
                        <a class="share-fb" href="#" target="_blank"><img src="{{ asset('themes/tienphuoc/images/icon/facebook-icon.png') }}" alt="Facebook" /></a>
                    </li>
                    <li class="zalo">
                        <div class="zalo-share-button" data-href="" data-oaid="579745863508352884" data-layout="2" data-color="blue" data-customize=false></div>
                    </li>
                    <li class="twitter">
                        <a class="share-tw" href="#" target="_blank"><img src="{{ asset('themes/tienphuoc/images/icon/twiter-icon.png') }}" alt="Twitter" /></a>
                    </li>
                    {{-- <li class="instagram">
                        <a href="#" target="_blank"><img src="{{ asset('themes/tienphuoc/images/icon/instagram-icon.png') }}" alt="Instagram" /></a>
                    </li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>