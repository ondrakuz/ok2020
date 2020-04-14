@extends('base')

@section('title', env('APP_NAME').' - '.$menu->name)
@section('description', $menu->meta_description)

@section('content')
    <div style="margin-top: 50px;">
        <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ $menu->name }}</h2>
    
        <!-- Icon Divider -->
        <div class="divider-custom">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon">
                <i class="fas fa-star"></i>
            </div>
            <div class="divider-custom-line"></div>
        </div>
    </div>
    @forelse ($articles as $article)
        <article class="article mb-5">
            <header>
                <h3>
                    <a href="{{ route('article.show', ['article' => $article]) }}">{{ $article->title }}</a>
                </h3>
            </header>

            <p class="article-content mb-1">{!! $article->perex !!}</p>

            <footer>
                <p class="small text-secondary">
                    <i class="fa fa-calendar"></i> Naposledy upraveno {{ $article->updated_at->diffForHumans() }}
                </p>
            </footer>
        </article>
    @empty
        <p>Zatím se zde nenachází žádné články.</p>
    @endforelse
@endsection