@extends('base')

@section('title', env('APP_NAME').' - '.$article->title)
@section('description', $article->description)

@section('content')
    <article class="article" >
        <header>
            <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">{{ $article->title }}</h2>
      
            <!-- Icon Divider -->
            <div class="divider-custom">
                <div class="divider-custom-line"></div>
                <div class="divider-custom-icon">
	                <i class="fas fa-star"></i>
                </div>
                <div class="divider-custom-line"></div>
            </div>
            {!! $article->perex !!}
        </header>

        <div class="article-content">{!! $article->content !!}</div>

    </article>
@endsection
