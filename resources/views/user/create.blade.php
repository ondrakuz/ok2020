@extends('admin.base')

@section('title', env('APP_NAME').' - '.__('Administrator').' - '. __('Add New Article'))
@section('description', env('APP_NAME').' - '.__('Administrator').' - '. __('Add New Article'))

@section('content')
    <div class="row">
    	<div class="col-sm-2 mx-auto"></div>
        <div class="col-sm-8 mx-auto">
           <h4>{{  __('Add New User') }}</h4>
           <form method="POST" action="{{ route('register') }}">
                @csrf

                <div class="form-group row">
                    <label for="nick" class="col-md-2 col-form-label text-md-right">{{ __('Nick') }}</label>

                    <div class="col-md-6">
                        <input id="nick" type="text" class="form-control @error('name') is-invalid @enderror" name="nick" value="{{ old('nick') }}" required autocomplete="nick" autofocus>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-md-2 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password" class="col-md-2 col-form-label text-md-right">{{ __('Password') }}</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label for="password-confirm" class="col-md-2 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>

                <!-- div class="form-group row">
                    <label class="col-md-2 col-form-label text-md-right">{{ __('User Role') }}</label>

                    <div class="col-md-6">
                        <label for="role_id_registered" class="col-md-4 col-form-label text-md-right">{{ __('Registered') }}</label><input id="role_id_registered" type="radio" name="role_id" value="4" required autocomplete="role_id" checked="checked"><br />
                        <label for="role_id_moderator" class="col-md-4 col-form-label text-md-right">{{ __('Moderator') }}</label><input id="role_id_moderator" type="radio" name="role_id" value="3" required autocomplete="role_id"><br />
                        <label for="role_id_manager" class="col-md-4 col-form-label text-md-right">{{ __('Manager') }}</label><input id="role_id_manager" type="radio" name="role_id" value="2" required autocomplete="role_id"><br />
                        <label for="role_id_admin" class="col-md-4 col-form-label text-md-right">{{ __('Admin') }}</label><input id="role_id_admin" type="radio" name="role_id" value="1" required autocomplete="role_id">
                    </div>
                </div -->

                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-2">
                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </div>
                </div>
            </form>
       </div>
       <div class="col-sm-1 mx-auto"></div>
   </div>
@endsection
        