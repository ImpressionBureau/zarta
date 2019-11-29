<section class="form-section" style="background-image: url(../images/form-bg.jpg)">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg col-xl-10">

                <div class="row no-gutters">
                    <div class="col-lg-6">
                        <div class="form__img d-none d-lg-block"
                             style="background-image: url(../images/form-img.jpg)"></div>
                    </div>
                    <div class="col-lg-6">

                        <div class="form">
                            <form action="{{ route('app.appointments.form') }}" method="post">
                                @csrf
                                <h3 class="form__title">@lang('common.form.title')</h3>
                                <p class="form__description">@lang('common.form.description')</p>

                                <div class="field">
                                    <label for="form-name">@lang('common.form.name')</label>
                                    <input id="form-name" name="form-name" type="text" class="field__item" required>
                                </div>

                                <div class="field">
                                    <label for="form-phone">@lang('common.form.phone')</label>
                                    <input id="form-phone" name="form-phone" type="tel" class="field__item" required>
                                </div>

                                <div class="field">
                                    <label for="form-email">Email</label>
                                    <input id="form-email" name="form-email" type="email" class="field__item">
                                </div>

                                <div class="field">
                                    <button class="btn btn-primary"><span>@lang('common.form.btn')</span></button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>