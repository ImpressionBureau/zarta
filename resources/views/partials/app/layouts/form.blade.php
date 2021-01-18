<section class="form-section lozad {{ $classes ?? '' }}"
         data-background-image="{{ asset('images/form-bg.jpg') }}">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg col-xl-10">

                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <div class="form__img d-none d-lg-block lozad"
                             data-background-image="{{ asset('images/form-img.jpg') }}"></div>
                    </div>
                    <div class="col-lg-6">
                        <x-feedback-form :type="$type ?? ''" :model="$model ?? ''" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
