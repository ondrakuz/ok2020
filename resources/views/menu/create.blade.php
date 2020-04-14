@extends('admin.base')

@section('title', env('APP_NAME').' - '.__('Administrator').' - '. __('Add Menu Item'))
@section('description', env('APP_NAME').' - '.__('Administrator').' - '. __('Add Menu Item'))

@section('content')
                <div class="row">
                	<div class="col-sm-2 mx-auto"></div>
                    <div class="col-sm-8 mx-auto">
		                <h4 >{{ _('Add Menu Item') }}</h4>
		                <!-- Insert Menu Form -->
                        <form action="{{ route('menu.store') }}" method="POST">
                        	@csrf
                        	
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>{{ __('Name of Menu') }}</label>
                                    <input class="form-control" id="name" name="name" type="text" value="{{ old('name') }}" placeholder="{{ __('Name of Menu') }}" required="required" data-validation-required-message="{{ __('Please enter name of menu.') }}" />
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>{{ __('Url') }}</label>
                                    <input class="form-control" id="url" name="url" type="text" value="{{ old('url') }}" placeholder="{{ __('Menu Url') }}" required="required" data-validation-required-message="{{ __('Please enter menu url.') }}" />
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>{{ __('In which object this items is located') }}</label>
                                    <select class="form-control" id="web_structure_id" name="web_structure_id" required="required" data-validation-required-message="Please select Type Of Page.">
                                    @foreach ($webStructures as $wstr)
                                    	@if (!empty(old('web_structure_id')) && old('web_structure_id') == $wstr->id)
                                    		<option value="{{ $wstr->id }}" selected="selected">{{ $wstr->web_structure }}</option>
                                		@else
                                			<option value="{{ $wstr->id }}">{{ $wstr->web_structure }}</option>
                                		@endif
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>{{ __('Parent Menu') }}</label>
                                    <select class="form-control" id="parent_menu_id" name="parent_menu_id" required="required" data-validation-required-message="Please select Type Of Page.">
                                    	<option value="0" > -- </option>
                                        @foreach ($menus as $item)
                                        	@if (!empty(old('parent_menu_id')) && old('parent_menu_id') == $item->id)
                                        		<option value="{{ $item->id }}" selected="selected">{{ $item->name }}</option>
                                    		@else
                                    			<option value="{{ $item->id }}">{{ $item->name }}</option>
                                    		@endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>{{ __('Type Of Page') }}</label>
                                    <select class="form-control" id="type_of_page_id" name="type_of_page_id" required="required" data-validation-required-message="Please select Type Of Page.">
                                        @foreach ($typesOfPages as $top)
                                        	@if (!empty(old('type_of_page_id')) && old('type_of_page_id') == $top->id)
                                        		<option value="{{ $top->id }}" selected="selected">{{ $top->type_of_page }}</option>
                                    		@else
                                    			<option value="{{ $top->id }}">{{ $top->type_of_page }}</option>
                                    		@endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>{{ __('Title Page') }}</label>
                                    <input id="title_page" name="title_page" type="checkbox"  @php if (!empty(old('title_page'))) { echo("checked=\"checked\""); } @endphp/>
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>{{ __('Priority') }}</label>
                                    <input class="form-control" id="priority" name="priority" type="number" min="1" max="20" value="@php if (!empty(old('priority'))) { echo(old('priority')); } else { echo("10"); } @endphp" required="required" data-validation-required-message="{{ __('Please enter priority of menu.') }}" />
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>{{ __('Meta Title') }}</label>
                                    <input class="form-control" id="meta_title" name="meta_title" type="text" value="{{ old('meta_title') }}" placeholder="{{ __('Meta Title') }}" required="required" data-validation-required-message="{{ __('Please enter meta title.') }}" />
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>{{ __('Meta Description') }}</label>
                                    <input class="form-control" id="meta_description" name="meta_description" type="text" value="{{ old('meta_description') }}" placeholder="{{ __('Meta Description') }}" required="required" data-validation-required-message="{{ __('Please enter meta description.') }}" />
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>{{ __('Meta Key Words') }}</label>
                                    <input class="form-control" id="meta_key_words" name="meta_key_words" type="text" value="{{ old('meta_key_words') }}" placeholder="{{ __('Meta Key Words') }}" required="required" data-validation-required-message="{{ __('Please enter meta key words.') }}" />
                                </div>
                            </div>
                            <div class="control-group">
                                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                    <label>{{ __('Display') }}</label>
                                    <input id="display" name="display" type="checkbox" {{ !empty(old('display'))? (old('display') ? "checked=\"checked\"" : "") : "checked=\"checked\"" }}/>
                                </div>
                            </div>
                            <br />
                            <div id="success"></div>
                            <div class="form-group"><button class="btn btn-primary btn-xl" id="sendMenuItemButton" type="submit">{{ __('Save Menu') }}</button></div>
                        </form>
                    </div>
                    <div class="col-sm-2 mx-auto"></div>
                </div>
@endsection
                