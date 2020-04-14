@extends('admin.base')

@section('title', env('APP_NAME').' - '.__('Administrator').' - '. __('Articles Overview'))
@section('description', env('APP_NAME').' - '.__('Administrator').' - '. __('Articles Overview'))

@section('content')
          <h4>{{ __('Articles Overview') }}</h4>
    @forelse ($articles as $article)
    	@if ($loop->first)
          <div class="table-responsive">
            <table class="table table-hover">
              <caption class="text-center">{{ __('Articles Overview') }}</caption>
              <thead><tr><th>{{ __('Title') }}</th><th>{{ __('Url') }}</th><th>{{ __('Author') }}</th><th>{{ __('Menu') }}</th><th class="text-center">{{ __('Last change') }}</th><th class="text-center">{{ __('Published') }}</th><th class="text-center">{{ __('Discussion') }}</th><th class="text-center">{{ __('Edit') }}</th><th class="text-center">{{ __('Delete') }}</th></tr></thead>
              <tbody>
        @endif
                   <tr>
                    <td>{{ $article->title }}</td>
                    <td>{{ $article->url }}</td>
                    <td>{{ $article->nick }}</td>
                    <td>{{ $article->menu_name }}</td>
                    <td class="text-center">@php $updatedAt = new Carbon\Carbon($article->updated_at); @endphp {{ $updatedAt->isoFormat('LLL') }}</td>
                    <td class="text-center"><a href="{{ env('APP_URL') }}/article/published/{{ $article->url }}">@php if ($article->published) { @endphp<img src="{{ env('APP_URL') }}/assets/icons/accept.png" alt="published"/>@php } else { @endphp<img src="{{ env('APP_URL') }}/assets/icons/cross.png" width="16" height="16"  alt="non-published"/>@php } @endphp</a></td>
                    <td class="text-center">@php
                    if ($article->discussion) { echo("<a href=\"".env('APP_URL')."/article/discussion/".$article->url."\"><img src=\"".env('APP_URL')."/assets/icons/comment.png\" alt=\"discussion\"/></a>"); }
                      else { echo("<img src=\"".env('APP_URL')."/assets/icons/delete.png\" alt=\"discussion\"/>"); }
                    @endphp</td>
                    <td class="text-center"><a href="{{ env('APP_URL') }}/article/edit/{{ $article->url }}"><img src="{{ env('APP_URL') }}/assets/icons/pencil.png" width="16" height="16" /></a></td>
                    <td class="text-center"><a href="{{ env('APP_URL') }}/article/delete/{{ $article->url }}"><img src="{{ env('APP_URL') }}/assets/icons/bin_closed.png" width="16" height="16" /></a></td>
                  </tr>
          @if ($loop->last)
                </tbody>
            </table>
          </div>
          @endif
    @empty
          <div class="message">{{ __('There are not stored any articles') }}</div>
    @endforelse
@endsection