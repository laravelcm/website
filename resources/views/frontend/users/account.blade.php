@extends('layouts.app')
@section('title', __('My Account'))

@section('content')

    <header class="page-header">
        <div class="container">
            <div class="header__text">
                <h1 class="page__title">{{ __('My account') }}</h1>
            </div>
            <div class="header__link">
                <a href="{{ route('logout') }}" class="btn btn-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </div>
    </header>

    <section class="account">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-3">
                    @include('frontend.users.sidebar')
                </div>
                <div class="col-sm-12 col-md-9">
                    <div class="card forum_account">
                        <h2>{{ __('Profile') }}</h2>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <div class="account__grid">
                                <div class="account_info">
                                    <div class="form-group">
                                        <label for="name">{{ __('Name') }} <small class="text-danger">*</small></label>

                                        <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ auth()->user()->name }}" required>

                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <label for="email">{{ __('E-Mail Address') }} <small class="text-danger">*</small></label>

                                        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ auth()->user()->email }}" disabled>

                                        @if ($errors->has('email'))
                                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="phone_number">{{ __('Phone Number') }}</label>
                                        <input id="phone_number" type="email" class="form-control" name="phone_number" value="{{ auth()->user()->phone_number }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="twitter_profile">{{ __('Your Twitter') }}</label>
                                        <input id="twitter_profile" type="text" class="form-control" name="twitter_profile" value="{{ auth()->user()->twitter_profile }}" placeholder="@laravelcm">
                                    </div>

                                    <div class="form-group">
                                        <label for="github_profile">{{ __('Your Github Username') }}</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">https://github.com/</span>
                                            </div>
                                            <input id="github_profile" type="text" class="form-control" name="github_profile" value="{{ auth()->user()->github_profile }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="account_avatar">
                                @if(Config::get('chatter.user.avatar_image_database_field'))

                                    <?php $db_field = Config::get('chatter.user.avatar_image_database_field'); ?>

                                    <!-- If the user db field contains http:// or https:// we don't need to use the relative path to the image assets -->
                                        @if( (substr(auth()->user()->{$db_field}, 0, 7) == 'http://') || (substr(auth()->user()->{$db_field}, 0, 8) == 'https://') )
                                            <img src="{{ auth()->user()->{$db_field}  }}" alt="user avatar" class="rounded">
                                        @else
                                            <img src="{{ Config::get('chatter.user.relative_url_to_image_assets') . auth()->user()->{$db_field}  }}" alt="user avatar" class="rounded">
                                        @endif

                                    @endif
                                    <input type="file" name="avatar" id="avatar" class="form-control-file">
                                </div>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">{{ __('Update') }}</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
