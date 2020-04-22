<!-- ADMINISTRATOR LAYOUT -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
	<head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta name="description" content="@yield('description')" />
        <title>@yield('title', env('APP_NAME').' - Administrator')</title>
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js" type="text/javascript"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
        <link rel="stylesheet" href="{{ env('APP_URL') }}/css/admin.css" type="text/css" />
	</head>
	<body>
        <div class="container-fluid">
            <div id="header">
                <table class="header"><tr>
                    <td class="logo">
                    	<div>
                        	<a href="{{ env('APP_URL') }}/menu/administrator/"><h1>{{ env('APP_NAME') . __(' Administrator') }}</h1></a><br />
                        	<a href="{{ env('APP_URL') }}"><h3>{{ env('APP_NAME') . __(' Site') }}</h3></a>
                    	</div>
                    </td>
                    <td class="user">
                    	{{ __('User') }}: <img src="{{ env('APP_URL') }}/assets/icons/@php if ($user->role->slug === 'admin') {echo "admin";} else {echo "user";} @endphp.png"/> <span@php if ($user->role->slug === 'admin') {echo " class='red' ";} elseif ($user->role->slug === 'manager') {echo " class='green' ";}@endphp>{{ $user->nick }}</span><br />
            	        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-primary btn-sm" style="display: inline-block; background-color: #acacac; border: none; padding: 0; margin: 0;">
                                {{ __('Logout') }}
                            </button>
                        </form>
                    </td>
                </tr></table>
            </div><!-- /#header -->
            <div class="row">
              	<div class="col-sm-2" >
                	<ul class="list-group" id="left_panel">
                    	<li class="list-group-item"><div class="category">
                    		<img src="{{ env('APP_URL') }}/assets/icons/application_side_list.png" width="16" height="16" /> <span class="title">{{ __('Menu') }}</span>
                    		<ul class="list-group">
                                <li class="list-group-item"><a href="{{ env('APP_URL') }}/menu">{{ __('Overview of items') }}</a></li>
                                <li class="list-group-item"><a href="{{ env('APP_URL') }}/menu/create">{{ __('Add item') }}</a></li>
    		                </ul>
                  		</div></li>
                        <li class="list-group-item"><div class="category">
                            <img src="{{ env('APP_URL') }}/assets/icons/page_white_text.png" width="16" height="16" /> <span class="title">{{ __('Articles') }}</span>
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{ env('APP_URL') }}/article">{{ __('Overview of articles') }}</a></li>
                                <li class="list-group-item"><a href="{{ env('APP_URL') }}/article/create">{{ __('Add article') }}</a></li>
                            </ul>
                        </div></li>
                        <li class="list-group-item"><div class="category">
                            <img src="{{ env('APP_URL') }}/assets/icons/user.png" width="16" height="16" /> <span class="title">{{ __('Users') }}</span>
                        	<ul class="list-group">
                                <li class="list-group-item"><a href="{{ env('APP_URL') }}/user">{{ __('Overview of Users') }}</a></li>
                                <li class="list-group-item"><a href="{{ env('APP_URL') }}/user/create">{{ __('Add User') }}</a></li>
                                <li class="list-group-item"><a href="{{ env('APP_URL') }}/user/edit/{{ $user->nick }}">{{ __('Change Your Registration Data') }}</a></li>
                            </ul>
                        </div></li>
                        <li class="list-group-item"><div class="category">
                            <img src="{{ env('APP_URL') }}/assets/icons/hammer_screwdriver.png" width="16" height="16" /> <span class="title">{{ __('Settings') }}</span>
                            <ul class="list-group">
                                <li class="list-group-item"><a href="{{ env('APP_URL') }}/setting/layout">{{ __('Layout') }}</a></li>
                                <li class="list-group-item"><a href="{{ env('APP_URL') }}/setting/modules">{{ __('Modules') }}</a></li>
                                <!-- li class="list-group-item"><a href="{{ env('APP_URL') }}/setting/site">{{ __('Site') }}</a></li -->
                            </ul>
                        </div></li>
                    </ul>
                </div><!-- /.col-sm-2 -->
                <div class="col-sm-10" >
                    @if ($errors->any())
                        <div class="alert alert-danger mb-4">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
        
                    @yield('content')
                </div><!-- /.col-sm-10 -->
              <div class="row">
        		  <div class="col-sm-12">
                      <div class="panel panel-default text-center margintop30" style="width: 98%; margin-left: auto; margin-right: auto;">
            	          <div class="panel-footer" id="footer">Copyright &copy; <?php echo date("Y"); ?> Ondřej Kužel</a>            	           </div>
                      </div>
                  </div>
              </div><!-- /.row -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
        @stack('scripts')
	</body>  
</html> 
