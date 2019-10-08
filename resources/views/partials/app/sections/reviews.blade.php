<section class="feedback-section">
    <div class="container-fluid">
        <div class="row no-gutters align-items-center">
            <div class="col-xl-7">
                <div class="video-feedback" data-youtube="https://www.youtube.com/watch?v=NeQM1c-XCDc"></div>
            </div>
            <div class="col-xl-5 d-flex flex-column  justify-content-center">
                <div class="texting-feedback flex-grow-1">
                    <h3 class="mb-4">відгуки наших пацієнтів</h3>

                    <div class="texting-slider">

                        <?php foreach ($texting_feedback as $feedback) : ?>
                        <div class="texting-slider__item">
                            <div class="row">
                                <div class="col-xl-5">
                                    <div class="avatar" style="background-image: url(<?= $feedback['avatar']; ?>)"></div>
                                </div>
                                <div class="col d-flex flex-column justify-content-center">
                                    <p class="text"><?= $feedback['text']; ?></p>
                                    <div class="d-flex align-items-center justify-content-between pt-3">
                                        <p class="date"><?= $feedback['date']; ?></p>
                                        <a href="<?= $feedback['name-link']; ?>" class="name d-flex align-items-center">
                                            <svg width="15" height="15">
                                                <use xlink:href="#fb-icon"></use>
                                            </svg>
                                            <?= $feedback['name']; ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>

                    </div>

                    <div class="row align-items-center mt-5">
                        <div class="col-xl-5">
                            <div class="d-flex align-items-center justify-content-between">
                                <div class="texting-slider-nav d-flex">
                                    <div class="texting-arrow texting-arrow--left">
                                        <svg width="9" height="15">
                                            <use xlink:href="#arrow-left"></use>
                                        </svg>
                                    </div>
                                    <div class="texting-arrow texting-arrow--right">
                                        <svg width="9" height="15">
                                            <use xlink:href="#arrow-right"></use>
                                        </svg>
                                    </div>
                                </div>
                                <div class="texting-slider-counter">
                                    .
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <a href="#" class="btn btn-secondary w-100"><span>ЧИТАТИ ВСI ВIДГУКИ</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <a href="#" class="appointment d-flex flex-column align-items-center justify-content-center" style="background-image: url(../images/appointment-bg.jpg)">
            <h2 class="appointment__title">Записатись на прийом</h2>
            <p class="appointment__text">Бажаєте поставити запитання, уточнити деталі або в чомусь сумніваєтеся? <br>Будь ласка, залиште свій номер - ми обов'язково вам допоможемо</p>
            <p class="appointment__link mt-4" href="#">
                ЗАПИСАТИСЬ НА ПРИЙОМ
                <svg width="20" height="6">
                    <use xlink:href="#arrow-link"></use>
                </svg>
            </p>
        </a>
    </div>
</section>