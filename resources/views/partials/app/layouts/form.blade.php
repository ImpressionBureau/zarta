<section class="form-section" style="background-image: url(../images/form-bg.jpg)">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg col-xl-10">

                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <div class="form__img d-none d-lg-block" style="background-image: url(../images/form-img.jpg)"></div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form">
                            <h3 class="form__title">@lang('common.form.title')</h3>
                            <p class="form__description">@lang('common.form.description')</p>

                            <div class="field">
                                <label for="id1">@lang('common.form.name')</label>
                                <input id="id1" type="text" class="field__item">
                            </div>

                            <div class="field">
                                <label for="id2">@lang('common.form.phone')</label>
                                <input id="id2" type="text" class="field__item">
                            </div>

                            <div class="field">
                                <label for="id3">Email</label>
                                <input id="id3" type="text" class="field__item">
                            </div>

                            <div class="field">
                                <button class="btn btn-primary"><span>@lang('common.form.btn')</span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>