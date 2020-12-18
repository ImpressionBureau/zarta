<section class="bg-light py-3 py-lg-5">
    <div class="container">
        <h2 class="text-center">{{ __('common.menu.blog') }}</h2>
        <div class="row no-gutters">
            @each('partials.app.blog.article', $articles, 'article')
        </div>
    </div>
</section>
