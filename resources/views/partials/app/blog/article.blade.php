<div class="col-xxl-3 col-md-6 col-lg-4">
    <div class="article">
        <a href="{{ route('app.articles.show', $article) }}" class="article__img lozad"
           data-background-image="{{ $article->hasMedia('uploads') ? $article->getFirstMedia('uploads')->getFullUrl('preview') : asset('images/no-image.png') }}"></a>
        <div class="article__content">
            <p class="date d-flex">
                <svg width="10" height="10">
                    <use xlink:href="#date-icon"></use>
                </svg>
                {{$article->created_at->formatLocalized('%d %B %Y')}}
            </p>

            <h3 class="title">{{$article->title}}</h3>

            <p class="text">{!! remove_tags($article->content->body) !!}</p>

            <a href="{{ route('app.articles.show', $article) }}" class="link">
                @lang('common.articles.read')
                <svg width="20" height="6">
                    <use xlink:href="#arrow-link"></use>
                </svg>
            </a>
        </div>
    </div>
</div>
