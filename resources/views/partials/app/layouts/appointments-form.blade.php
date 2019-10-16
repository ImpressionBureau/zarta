<div class="custom-modal">

    <div class="close-modal">
        <svg width="20" height="20">
            <use xlink:href="#close-icon"></use>
        </svg>
        ЗАКРЫТЬ
    </div>

    <div class="container-fluid">
        <div class="row no-gutters">
            <div class="col-xl-6">
                <div class="form__img" style="background-image: url(../images/form-img.jpg)"></div>
            </div>
            <div class="col-xl-6">
                <div class="form">
                    <h3 class="form__title">@lang('common.form.title')</h3>
                    <p class="form__description">@lang('common.form.description')</p>

                    <div class="modal-price"></div>

                    <div class="field">
                        <label for="modal-id1">@lang('common.form.name')</label>
                        <input id="modal-id1" type="text" class="field__item">
                    </div>

                    <div class="field">
                        <label for="modal-id2">@lang('common.form.phone')</label>
                        <input id="modal-id2" type="text" class="field__item">
                    </div>

                    <div class="field">
                        <label for="modal-id3">Email</label>
                        <input id="modal-id3" type="text" class="field__item">
                    </div>

                    <div class="field">
                        <button class="btn btn-primary"><span>@lang('common.form.btn')</span></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal-mask"></div>