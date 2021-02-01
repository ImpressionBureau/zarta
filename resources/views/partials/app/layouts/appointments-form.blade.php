<div class="custom-modal">
    <div class="close-modal">
        <svg width="20" height="20">
            <use xlink:href="#close-icon"></use>
        </svg>
        <span class="text-uppercase">{{ __('common.menu.close') }}</span>
    </div>

    <div class="container-fluid">
        <div class="row no-gutters justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6">
                <div class="form__img lozad"
                     data-background-image="{{ app('settings')->hasMedia('feedback') ? app('settings')->getFirstMedia('feedback')->getFullUrl('thumb') : asset('images/form-img.jpg') }}"></div>
            </div>
            <div class="col-xl-6">
                <x-feedback-form :type="$type ?? ''" :model="$model ?? ''" />
            </div>
        </div>
    </div>
</div>

<div class="modal-mask"></div>
