@extends('admin.base')

@section('title', env('APP_NAME').' - '.__('Administrator').' - '. __('Menu Items Overview'))
@section('description', env('APP_NAME').' - '.__('Administrator').' - '. __('Menu Items Overview'))

@section('content')
          <h4>{{ __('Menu Items Overview') }}</h4>
          @if (!count($menus))
          	  <div class="message">{{ __('There are not saved any items of menu') }}</div>
          @else
                <div class="table-responsive">
                    <table class="table table-hover">
	                    <caption class="text-center">{{ __('Overview Of Horizontal Menu') }}</caption>
    	                <thead>
        	            	<tr>
            	        		<th>{{ __('Name') }}</th>
                	    		<!-- th>{{ __('Language') }}</th -->
                    			<th class="text-center">{{ __('Title page') }}</th>
                    			<th>{{ __('Url') }}</th>
                    			<th class="text-center">{{ __('Display') }}</th>
	                  	  	  	<th class="text-center">{{ __('Priority') }}</th>
    	              		  	<th class="text-center">{{ __('Edit') }}</th>
        	          		  	<th class="text-center">{{ __('Delete') }}</th>
            	      	</tr>
                	  </thead>
                  	  <tbody>
                	  @foreach($menus as $item)
                	  	  @if ($item->web_structure_id === 1)
                          <tr>
                              <td>{{ $item->name }}</td>
                              <!-- td><img src="/publicWeb/flags/item.text_id.png" /> item.language</td -->
                              <td class="text-center"><a href="{{ env('APP_URL') }}/menu/title-page/{{ $item->url }}">
                              	  @if ($item->title_page)
                              	  	  <img src="{{ env('APP_URL') }}/assets/icons/accept.png"/>
								  @else
								  	  <img src="{{ env('APP_URL') }}/assets/icons/cross.png" width="16" height="16" />
								  @endif
							  </a></td>
                              <td>{{ $item->url }}</td>
                              <td class="text-center">
                              	  <a href="{{ env('APP_URL') }}/menu/display/{{ $item->url }}">
                              	  	  @if ($item->display)
                              	  		  <img src="{{ env('APP_URL') }}/assets/icons/accept.png"/>
                          	  		  @else
                          	  		  	  <img src="{{ env('APP_URL') }}/assets/icons/cross.png" width="16" height="16" />
                      	  		  	  @endif
                  	  		  	  </a>
              	  		  	  </td>
                              <td class="text-center" style="white-space: nowrap !important;">
                              	{{ $item->priority }} @if ($item->priority > 1)
									<a href="{{ env('APP_URL') }}/menu/priority-up/{{ $item->url }}">
										<img src="{{ env('APP_URL') }}/assets/icons/arrow_up.png" width="10" height="10" />
									</a>
								@else
									<img src="{{ env('APP_URL') }}/assets/icons/arrow_up.png" width="10" height="10" />
								@endif
								@if ($item->priority < 20)
									<a href="{{ env('APP_URL') }}/menu/priority-down/{{ $item->url }}">
										<img src="{{ env('APP_URL') }}/assets/icons/arrow_down.png" width="10" height="10" />
									</a>
								@else
									<img src="{{ env('APP_URL') }}/assets/icons/arrow_down.png" width="10" height="10" style="display: inline;"/>
								@endif
							  </td>
                              <td class="text-center">
                              	<a href="{{ env('APP_URL') }}/menu/edit/{{ $item->url }}">
                              		<img src="{{ env('APP_URL') }}/assets/icons/pencil.png" width="16" height="16" />
                          		</a>
                          	  </td>
                              <td class="text-center">
                              	<a href="{{ env('APP_URL') }}/menu/delete/{{ $item->url }}">
                              		<img src="{{ env('APP_URL') }}/assets/icons/bin_closed.png" width="16" height="16" />
                          		</a>
                          	  </td>
                          </tr>
                          @endif
                        @endforeach
              </tbody>
            </table>
          </div>
                <div class="table-responsive">
                    <table class="table table-hover">
	                    <caption class="text-center">{{ __('Overview Of Vertical Menu') }}</caption>
    	                <thead>
        	            	<tr>
            	        		<th>{{ __('Name') }}</th>
                	    		<!-- th>{{ __('Lamguage') }}</th -->
                    			<th class="text-center">{{ __('Title page') }}</th>
                    			<th>Odkaz</th>
                    			<th class="text-center">{{ __('Display') }}</th>
	                  	  	  	<th class="text-center">{{ __('Priority') }}</th>
    	              		  	<th class="text-center">{{ __('Edit') }}</th>
        	          		  	<th class="text-center">{{ __('Delete') }}</th>
            	      	</tr>
                	  </thead>
                  	  <tbody>
                	  @foreach($menus as $item)
                	  	  @if ($item->web_structure_id === 2)
                          <tr>
                              <td>{{ $item->name }}</td>
                              <!-- td><img src="/publicWeb/flags/{{ $item->text_id }}.png" /> {{ $item->language }}</td -->
                              <td class="text-center"><a href="{{ env('APP_URL') }}/menu/title-page/{{ $item->url }}">
                              	  @if ($item->title_page)
                              	  	  <img src="{{ env('APP_URL') }}/assets/icons/accept.png"/>
								  @else
								  	  <img src="{{ env('APP_URL') }}/assets/icons/cross.png" width="16" height="16" />
								  @endif
							  </a></td>
                              <td>{{ $item->url }}</td>
                              <td class="text-center">
                              	  <a href="{{ env('APP_URL') }}/menu/display/{{ $item->url }}">
                              	  	  @if ($item->display)
                              	  		  <img src="{{ env('APP_URL') }}/assets/icons/accept.png"/>
                          	  		  @else
                          	  		  	  <img src="{{ env('APP_URL') }}/assets/icons/cross.png" width="16" height="16" />
                      	  		  	  @endif
                  	  		  	  </a>
              	  		  	  </td>
                              <td class="text-center">
                              	{{ $item->priority }} @if ($item->priority < 21)
									<a href="{{ env('APP_URL') }}/menu/priorityup/{{ $item->url }}">
										<img src="{{ env('APP_URL') }}/assets/icons/arrow_up.png" width="16" height="16" />
									</a>
								@else
									<img src="{{ env('APP_URL') }}/assets/icons/arrow_up.png" width="16" height="16" />
								@endif
								@if ($item->priority > 0)
									<a href="{{ env('APP_URL') }}/menu/prioritydown/{{ $item->url }}">
										<img src="{{ env('APP_URL') }}/assets/icons/arrow_down.png" width="16" height="16" />
									</a>
								@else
									<img src="{{ env('APP_URL') }}/assets/icons/arrow_down.png" width="16" height="16" />
								@endif
							  </td>
                              <td class="text-center">
                              	<a href="{{ env('APP_URL') }}/menu/edit/{{ $item->url }}">
                              		<img src="{{ env('APP_URL') }}/assets/icons/pencil.png" width="16" height="16" />
                          		</a>
                          	  </td>
                              <td class="text-center">
                              	<a href="{{ env('APP_URL') }}/menu/delete/{{ $item->url }}">
                              		<img src="{{ env('APP_URL') }}/assets/icons/bin_closed.png" width="16" height="16" />
                          		</a>
                          	  </td>
                          </tr>
                          @endif
                        @endforeach
              </tbody>
            </table>
          </div>
    @endif
@endsection
