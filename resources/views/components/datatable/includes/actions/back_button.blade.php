@if(filled($route))
    <a href="{{ $route }}" data-toggle="tooltip" title="{{ $title ?? t_('show') }}"
       class="btn btn-icon  btn-active-color-primary btn-sm me-1">
        <!--begin::Svg Icon | path: /var/www/preview.keenthemes.com/kt-products/docs/metronic/html/releases/2022-08-29-071832/core/html/src/media/icons/duotune/arrows/arr054.svg-->
        <span class="svg-icon svg-icon-muted svg-icon-2hx"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21.7189 13.9C17.6189 9.8 11.4189 8.79999 6.21895 11.2L7.31895 12.9C11.719 11 16.919 12 20.319 15.4C20.519 15.6 20.819 15.7 21.019 15.7C21.219 15.7 21.5189 15.6 21.7189 15.4C22.1189 14.9 22.1189 14.2 21.7189 13.9Z" fill="currentColor"/>
                <path opacity="0.3" d="M10.119 17.1L3.61896 7L2.01895 14.3C1.91895 14.8 2.21895 15.4 2.81895 15.5L10.119 17.1Z" fill="currentColor"/>
            </svg>
        </span>
        <!--end::Svg Icon-->
    </a>
@endif
