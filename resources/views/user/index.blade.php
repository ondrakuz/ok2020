@extends('admin.base')

@section('title', env('APP_NAME').' - '.__('Administrator').' - '. __('Users Overview'))
@section('description', env('APP_NAME').' - '.__('Administrator').' - '. __('Users Overview'))

@section('content')
          <h4>{{ __('Users Overview') }}</h4>
          <div class="table-responsive">
            <table class="table table-hover">
              <caption class="text-center">{{ __('Users') }}</caption>
              <thead><tr><th>{{ __('Nick') }}</th><th>{{ __('E-mail') }}</th><th class="text-center">{{ __('Role') }}</th><th class="text-center">Editace</th><th class="text-center">{{ __('Delete') }}</th></tr></thead>
              <tbody>
                @foreach ($users as $oneUser)
                <tr>
                  <td>{{ $oneUser->nick }}</td>
                  <td>{{ $oneUser->email }}</td>
                  <td class="text-center">{!! UserHelper::formatPermCell($oneUser->toArray()) !!}</td>
                  <td class="text-center">{!! UserHelper::formatEditCell($oneUser->nick) !!}</td>
                  <td class="text-center">{!! UserHelper::formatDeleteCell($oneUser->toArray()) !!}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
@endsection
