@extends('base')

@section('title', env('APP_NAME').' - '.__('You are logged in'))
@section('description', __('You are logged in'))

@section('content')
    <article class="article">
        <header>
            <h1 class="display-4 mb-0">{{ __('You are logged in') }}</h1>
        </header>

        <div class="article-content">{{ __('You are logged in as user: ') }}<span style="font-weight: bolder;">{{ $user->nick }}</span></div>

    </article>
    <div>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-primary text-md-right" style="display: inline-block; margin-bottom: 35px;;">
                {{ __('Logout') }}
            </button>
        </form>
    </div>
@endsection