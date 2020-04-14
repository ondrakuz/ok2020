@extends('admin.base')

@section('title', env('APP_NAME').' - '.__('Administrator').' - '. __('Article Edit'))
@section('description', env('APP_NAME').' - '.__('Administrator').' - '. __('Article Edit'))

@section('content')
    <div class="row">
    	<div class="col-sm-2 mx-auto"></div>
        <div class="col-sm-8 mx-auto">
          <h4>{{  __('Edit the Article') }}</h4>
          <form method="post" action="{{ route('article.update', ['article' => $article]) }}">
          	@csrf
          	
          	@method('PUT')
          	
            <input type="hidden" id="user_id" name="user_id" value="{{ old('user_id') ?: $article->user_id }}" />
            <input type="hidden" id="id" name="id" value="{{ old('id') ?: $article->id }}" />
			<div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>{{  __('Title of Article') }}:</label>
                  <input type="text" class="form-control" id="title" name="title" value="{{ old('title') ?: $article->title }}" required="required" data-validation-required-message="{{ __('Please enter title of article.') }}"/>
                </div>
            </div>
			<div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>{{  __('Url of Article') }}:</label>
                  <input type="text" class="form-control" id="url" name="url" value="{{ old('url') ?: $article->url }}" required="required" data-validation-required-message="{{ __('Please enter url of article.') }}"/>
                </div>
            </div>
			<div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>{{  __('Published') }}:</label>
                  <input type="checkbox"  id="published" name="published"{{ (old('published') || $article->published)? ' checked="checked"' : '' }}/>
                </div>
            </div>
			<div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>{{  __('Page') }}:</label>
                  <select class="form-control" name="menu_id" id="menu_id" required="required"  data-validation-required-message="{{ __('Please select name of menu.') }}">
                  @foreach ($menus as $menu)
                  	@if ((!empty(old('menu_id')) && old('menu_id') == $menu->id) || $article->menu_id == $menu->id)
                  		<option value="{{ $menu->id }}" selected="selected">{{ $menu->name }}</option>
              		@else
          				<option value="{{ $menu->id }}" >{{ $menu->name }}</option>
          			@endif
                  @endforeach
                  </select>
                </div>
            </div>
			<div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>{{  __('Meta Description') }}:</label>
                  <input class="form-control" type="text" id="description" name="description" value="{{ old('description') ?: $article->description }}" data-validation-required-message="{{ __('Please enter description of article.') }}"/>
                </div>
            </div>
			<div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>{{  __('Key Words') }}:</label>
                  <input class="form-control" type="text" id="key_words" name="key_words" value="{{ old('key_words') ?: $article->key_words }}" data-validation-required-message="{{ __('Please enter key words of article.') }}"/>
                </div>
            </div>
            <div class="form-group">
            	<button class="btn btn-primary btn-xl" id="sendArticleButton" type="submit">{{ __('Save Article') }}</button>
        	</div>
			<div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>{{  __('Perex') }}:</label>
                  <textarea  class="form-control" id="perex" name="perex" required="required" data-validation-required-message="{{ __('Please enter perex of article.') }}">{{ old('perex') ?: $article->perex }}</textarea>
                </div>
            </div>
			<div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>{{  __('Content') }}:</label>
                  <textarea  class="form-control" id="content" name="content" required="required" data-validation-required-message="{{ __('Please enter content of article.') }}">{{ old('content') ?: $article->content }}</textarea>
                </div>
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
