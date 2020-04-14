@extends('admin.base')

@section('title', env('APP_NAME').' - '.__('Administrator').' - '. __('Add New Article'))
@section('description', env('APP_NAME').' - '.__('Administrator').' - '. __('Add New Article'))

@section('content')
    <div class="row">
    	<div class="col-sm-2 mx-auto"></div>
        <div class="col-sm-8 mx-auto">
          <h4>{{  __('Add New Article') }}</h4>
          <form action="{{ route('article.store') }}" method="POST">
          	@csrf
          	
            <input type="hidden" id="user_id" name="user_id" value="{{ $user->id }}" />

            <div class="form-group">
              <label>{{  __('Title of Article') }}:</label>
              <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required="required"  data-validation-required-message="{{ __('Please enter title of article.') }}"/>
            </div>

            <div class="form-group">
              <label>{{  __('Url of Article') }}:</label>
              <input type="text" class="form-control" id="url" name="url" value="{{ old('url') }}" required="required"/>
            </div>

            <div class="form-group">
              <label>{{  __('Published') }}:</label>
              <input type="checkbox"  id="published" name="published"{{ (empty(old('published')))? ' checked="checked"' : ((old('published'))? ' checked="checked"' : '') }} required="required"/>
            </div>

            <div class="form-group">
              <label>{{  __('Page') }}:</label>
              <select class="form-control" name="menu_id" id="menu_id" required="required"  data-validation-required-message="{{ __('Please select name of menu.') }}">
              @foreach ($menus as $menu)
              	@if (!empty(old('menu_id')) && old('menu_id') == $menu->id)
              		<option value="{{ $menu->id }}" selected="selected">{{ $menu->name }}</option>
          		@endif
      			<option value="{{ $menu->id }}" >{{ $menu->name }}</option>
              @endforeach
              </select>
            </div>

            <div class="form-group">
              <label>{{  __('Meta Description') }}:</label>
              <input class="form-control" type="text" id="description" name="description" value="{{ old('description') }}" required="required" data-validation-required-message="{{ __('Please enter description of article.') }}"/>
            </div>

            <div class="form-group">
              <label>{{  __('Key Words') }}:</label>
              <input class="form-control" type="text" id="key_words" name="key_words" value="{{ old('key_words') }}" required="required" data-validation-required-message="{{ __('Please enter key words of article.') }}"/>
            </div>

        	<button class="btn btn-primary" type="submit">{{ __('Save Article') }}</button><br /><br />

            <div class="form-group">
              <label>{{  __('Perex') }}:</label>
              <textarea  class="form-control" id="perex" name="perex" required="required" data-validation-required-message="{{ __('Please enter perex of article.') }}"></textarea>
            </div>

            <div class="form-group">
              <label>{{  __('Content') }}:</label>
              <textarea  class="form-control" id="content" name="content" required="required" data-validation-required-message="{{ __('Please enter content of article.') }}"></textarea>
            </div>

         </form>
       </div>
       <div class="col-sm-2 mx-auto"></div>
   </div>
@endsection
        
@push('scripts')
    <script type="text/javascript" src="{{ asset('js/ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript">
        CKEDITOR.replace( 'perex' );
        CKEDITOR.replace( 'content' );
    </script>
@endpush