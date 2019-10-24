<div class="custom-modal">

    <div class="close-modal">
        <svg width="20" height="20">
            <use xlink:href="#close-icon"></use>
        </svg>
        ЗАКРЫТЬ
    </div>

    <div class="container-fluid">
        <div class="row no-gutters justify-content-center">
            <div class="col-sm-10 col-md-8 col-lg-7 col-xl-6">
                <div class="form__img" style="background-image: url(../images/form-img.jpg)"></div>
            </div>
            <div class="col-xl-6">
                <div class="form">
                    <h3 class="form__title">@lang('common.form.title')</h3>
                    <p class="form__description">@lang('common.form.description')</p>
                    <form action="{{ route('app.appointments.modal') }}" method="post" class="services-form">
                        @csrf
                        <div class="modal-price"></div>
                        <div class="field">
                            <label for="modal-id1">@lang('common.form.name')</label>
                            <input id="modal-id1" name="modal-name" type="text" class="field__item" required>
                        </div>

                        <div class="field">
                            <label for="modal-id2">@lang('common.form.phone')</label>
                            <input id="modal-id2" name="modal-phone" type="tel" class="field__item" required>
                        </div>

                        <div class="field">
                            <label for="modal-id3">Email</label>
                            <input id="modal-id3" name="modal-email" type="email" class="field__item" required>
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

<div class="modal-mask"></div>