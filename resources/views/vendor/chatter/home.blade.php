@extends(Config::get('chatter.master_file_extend'))
@section('title', __('Forum'))

@push(Config::get('chatter.yields.head'))
    <link href="{{ url('/vendor/devdojo/chatter/assets/vendor/spectrum/spectrum.css') }}" rel="stylesheet">
    @if($chatter_editor == 'simplemde')
        <link href="{{ url('/vendor/devdojo/chatter/assets/css/simplemde.min.css') }}" rel="stylesheet">
    @elseif($chatter_editor == 'trumbowyg')
        <link href="{{ url('/vendor/devdojo/chatter/assets/vendor/trumbowyg/ui/trumbowyg.css') }}" rel="stylesheet">
        <style>
            .trumbowyg-box, .trumbowyg-editor {
                margin: 0px auto;
            }
        </style>
    @endif
@endpush

@section('content')

    <header class="page-header big_header">
        <div class="container">
            <div class="header__text">
                <h1 class="page__title">@lang('chatter::intro.headline')</h1>
                <p>@lang('chatter::intro.description')</p>
            </div>
        </div>
    </header>

    <div id="chatter" class="chatter_home">

        <div class="container">
            @if(config('chatter.errors'))
                @if(Session::has('chatter_alert'))
                    <div class="chatter-alert alert alert-{{ Session::get('chatter_alert_type') }}">
                        <div class="container">
                            <strong><i class="chatter-alert-{{ Session::get('chatter_alert_type') }}"></i> {{ Config::get('chatter.alert_messages.' . Session::get('chatter_alert_type')) }}</strong>
                            {{ Session::get('chatter_alert') }}
                            <i class="chatter-close"></i>
                        </div>
                    </div>
                    <div class="chatter-alert-spacer"></div>
                @endif

                @if (count($errors) > 0)
                    <div class="chatter-alert alert alert-danger">
                        <div class="container">
                            <p><strong><i class="chatter-alert-danger"></i> @lang('chatter::alert.danger.title')</strong> @lang('chatter::alert.danger.reason.errors')</p>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            @endif
        </div>

        <div class="container chatter_container">

            <div class="row">

                <div class="col-md-3 left-column">
                    <!-- SIDEBAR -->
                    <div class="chatter_sidebar">
                        <button class="btn btn-primary" id="new_discussion_btn"><i class="chatter-new"></i> @lang('chatter::messages.discussion.new')</button>
                        <a href="/{{ Config::get('chatter.routes.home') }}"><i class="chatter-bubble"></i> @lang('chatter::messages.discussion.all')</a>
                        {!! $categoriesMenu !!}
                    </div>
                    <!-- END SIDEBAR -->
                    @auth
                        <!-- Profil SIDEBAR -->
                        <div class="card text-white bg-primary card-profile">
                            <div class="card-header"><i class="icon ion-person"></i> {{ __('Personnal Informations') }}</div>
                            <div class="card-body">
                                <ul class="profil_content">
                                    {{--<li class="profil_item"><a href="javascript:;">{{ __('Follow Discussions') }}</a></li>
                                    <li class="profil_item"><a href="javascript:;">{{ __('My Discussions') }}</a></li>
                                    <li class="profil_item"><a href="javascript:;">{{ __('My Messages') }}</a></li>--}}
                                    <li class="profil_item"><a href="{{ route('users.account') }}">{{ __('My account') }}</a></li>
                                    <li class="profil_item">
                                        <a href="javascript:;" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- End Profil SIDEBAR -->
                    @endauth
                </div>
                <div class="col-md-9 right-column">
                    <div class="panel">
                        <ul class="discussions">
                            @forelse($discussions as $discussion)
                                <li>
                                    <a class="discussion_list" href="/{{ Config::get('chatter.routes.home') }}/{{ Config::get('chatter.routes.discussion') }}/{{ $discussion->category->slug }}/{{ $discussion->slug }}">
                                        <div class="chatter_avatar">
                                            @if(Config::get('chatter.user.avatar_image_database_field'))

                                                <?php $db_field = Config::get('chatter.user.avatar_image_database_field'); ?>

                                                <!-- If the user db field contains http:// or https:// we don't need to use the relative path to the image assets -->
                                                    @if( (substr($discussion->user->{$db_field}, 0, 7) == 'http://') || (substr($discussion->user->{$db_field}, 0, 8) == 'https://') )
                                                        <img src="{{ $discussion->user->{$db_field}  }}">
                                                    @else
                                                        <img src="{{ Config::get('chatter.user.relative_url_to_image_assets') . $discussion->user->{$db_field}  }}">
                                                    @endif

                                            @else

                                                <span class="chatter_avatar_circle" style="background-color:#<?= \DevDojo\Chatter\Helpers\ChatterHelper::stringToColorCode($discussion->user->{Config::get('chatter.user.database_field_with_user_name')}) ?>">
                                                    {{ strtoupper(substr($discussion->user->{Config::get('chatter.user.database_field_with_user_name')}, 0, 1)) }}
                                                </span>

                                            @endif
                                        </div>

                                        <div class="chatter_middle">
                                            <h3 class="chatter_middle_title">{{ $discussion->title }} <div class="chatter_cat" style="background-color:{{ $discussion->category->color }}">{{ $discussion->category->name }}</div></h3>
                                            <span class="chatter_middle_details">@lang('chatter::messages.discussion.posted_by') <span data-href="/user">{{ ucfirst($discussion->user->{Config::get('chatter.user.database_field_with_user_name')}) }}</span> {{ \Carbon\Carbon::createFromTimeStamp(strtotime($discussion->created_at))->diffForHumans() }}</span>
                                            @if($discussion->post[0]->markdown)
                                                <?php $discussion_body = GrahamCampbell\Markdown\Facades\Markdown::convertToHtml( $discussion->post[0]->body ); ?>
                                            @else
                                                <?php $discussion_body = $discussion->post[0]->body; ?>
                                            @endif
                                            <p>{{ substr(strip_tags($discussion_body), 0, 200) }}@if(strlen(strip_tags($discussion_body)) > 200){{ '...' }}@endif</p>
                                        </div>

                                        <div class="chatter_right">

                                            <div class="chatter_count"><i class="chatter-bubble"></i> {{ $discussion->postsCount[0]->total }}</div>
                                        </div>

                                        <div class="chatter_clear"></div>
                                    </a>
                                </li>
                            @empty
                                <li>
                                    <a href="javascript:;" class="discussion_list text-center">
                                        <h4>{{ __("This category does not have a discussion yet") }}</h4>
                                    </a>
                                </li>
                            @endforelse
                        </ul>
                    </div>

                    <div id="pagination">
                        {{ $discussions->links() }}
                    </div>

                </div>
            </div>
        </div>

        <div id="new_discussion">

            <div class="chatter_loader dark" id="new_discussion_loader">
                <div></div>
            </div>

            <form id="chatter_form_editor" action="/{{ Config::get('chatter.routes.home') }}/{{ Config::get('chatter.routes.discussion') }}" method="POST">
                <div class="row">
                    <div class="col-md-7">
                        <!-- TITLE -->
                        <input type="text" class="form-control" id="title" name="title" placeholder="@lang('chatter::messages.editor.title')" value="{{ old('title') }}" >
                    </div>

                    <div class="col-md-4">
                        <!-- CATEGORY -->
                        <select id="chatter_category_id" class="form-control" name="chatter_category_id">
                            <option value="">@lang('chatter::messages.editor.select')</option>
                            @foreach($categories as $category)
                                @if(old('chatter_category_id') == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @elseif(!empty($current_category_id) && $current_category_id == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
                                @else
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-1">
                        <i class="chatter-close"></i>
                    </div>
                </div><!-- .row -->

                <!-- BODY -->
                <div id="editor">
                    @if( $chatter_editor == 'tinymce' || empty($chatter_editor) )
                        <label id="tinymce_placeholder">@lang('chatter::messages.editor.tinymce_placeholder')</label>
                        <textarea id="body" class="richText" name="body" placeholder="">{{ old('body') }}</textarea>
                    @elseif($chatter_editor == 'simplemde')
                        <textarea id="simplemde" name="body" placeholder="">{{ old('body') }}</textarea>
                    @elseif($chatter_editor == 'trumbowyg')
                        <textarea class="trumbowyg" name="body" placeholder="@lang('chatter::messages.editor.tinymce_placeholder')">{{ old('body') }}</textarea>
                    @endif
                </div>

                <input type="hidden" name="_token" id="csrf_token_field" value="{{ csrf_token() }}">

                <div id="new_discussion_footer">
                    <input type='text' id="color" name="color" /><span class="select_color_text">@lang('chatter::messages.editor.select_color_text')</span>
                    <button id="submit_discussion" class="btn btn-success pull-right"><i class="chatter-new"></i> @lang('chatter::messages.discussion.create')</button>
                    <a href="/{{ Config::get('chatter.routes.home') }}" class="btn btn-default pull-right" id="cancel_discussion">@lang('chatter::messages.words.cancel')</a>
                    <div style="clear:both"></div>
                </div>
            </form>

        </div><!-- #new_discussion -->

    </div>


    @if( $chatter_editor == 'tinymce' || empty($chatter_editor) )
        <input type="hidden" id="chatter_tinymce_toolbar" value="{{ Config::get('chatter.tinymce.toolbar') }}">
        <input type="hidden" id="chatter_tinymce_plugins" value="{{ Config::get('chatter.tinymce.plugins') }}">
    @endif
    <input type="hidden" id="current_path" value="{{ Request::path() }}">

@endsection

@push(Config::get('chatter.yields.footer'))

    @if( $chatter_editor == 'tinymce' || empty($chatter_editor) )
        <script src="{{ url('/vendor/devdojo/chatter/assets/vendor/tinymce/tinymce.min.js') }}"></script>
        <script src="{{ url('/vendor/devdojo/chatter/assets/js/tinymce.js') }}"></script>
        <script>
            var my_tinymce = tinyMCE;
            $('document').ready(function(){
                $('#tinymce_placeholder').click(function(){
                    my_tinymce.activeEditor.focus();
                });
            });
        </script>
    @elseif($chatter_editor == 'simplemde')
        <script src="{{ url('/vendor/devdojo/chatter/assets/js/simplemde.min.js') }}"></script>
        <script src="{{ url('/vendor/devdojo/chatter/assets/js/chatter_simplemde.js') }}"></script>
    @elseif($chatter_editor == 'trumbowyg')
        <script src="{{ url('/vendor/devdojo/chatter/assets/vendor/trumbowyg/trumbowyg.min.js') }}"></script>
        <script src="{{ url('/vendor/devdojo/chatter/assets/vendor/trumbowyg/plugins/preformatted/trumbowyg.preformatted.min.js') }}"></script>
        <script src="{{ url('/vendor/devdojo/chatter/assets/js/trumbowyg.js') }}"></script>
    @endif

    <script src="{{ url('/vendor/devdojo/chatter/assets/vendor/spectrum/spectrum.js') }}"></script>
    <script src="{{ url('/vendor/devdojo/chatter/assets/js/chatter.js') }}"></script>
    <script>
        $('document').ready(function(){

            $('.chatter-close, #cancel_discussion').click(function(){
                $('#new_discussion').slideUp();
            });
            $('#new_discussion_btn').click(function(){
                @if(Auth::guest())
                    window.location.href = "{{ route('login') }}";
                @else
                $('#new_discussion').slideDown();
                $('#title').focus();
                @endif
            });

            $("#color").spectrum({
                color: "#333639",
                preferredFormat: "hex",
                containerClassName: 'chatter-color-picker',
                cancelText: '',
                chooseText: 'close',
                move: function(color) {
                    $("#color").val(color.toHexString());
                }
            });

            @if (count($errors) > 0)
            $('#new_discussion').slideDown();
            $('#title').focus();
            @endif


        });
    </script>
@endpush
