@extends('layouts.app')
@section('title', 'Article de test')

@section('content')

    <div class="container">
        <div class="ads"></div>

        <article class="single-post">
            <div class="post__thumb">
                <img src="{{ asset('img/post-2.png') }}" alt="Post thumb">
            </div>
            <header class="post__header">
                <span class="post__date">12 June, 2018</span>
                <h1 class="post__title">Laravel Tenancy – Multi-Tenant Package for Laravel</h1>
                <ul class="post__metadata">
                    <li class="author">
                        {{ __('by') }} <a href="javascript:;"> M. Arthur</a>
                    </li>
                    <li class="views">
                        <i class="fa fa-eye"></i> 1250 {{ __('views') }}
                    </li>
                    <li class="category">
                        Category : <a href="javascript:;">Laravel Tools</a>
                    </li>
                </ul>
            </header>
            <div class="post__content">
                Lorem ipsum dolorsit amet, consectetur adipiscing elit  sit amet, consectetur Lorem ipsum dolorsit
                adipiscing elit. Lorem ipsum dolorsit .

                Today, we are share with youu how to implement yajra datatable in laravel application with example. in your application sorting, searching and pagination functionality is common if you use simple table for display your application data iin tabuler forrmate so you should also write manualy code for it all functionality. and it is very painful and take some time.

                But, if you use yajra datatable package in your laravel application then you can save this time. because yajra datatable jquery package provide all those functionality ready made nothing else write of single line for it.

                yajra datatable provide following functionality for data display in tabuler formate. here listing some basic and core functionality of yajra datatable

                1. Pagination 2. Full Searching 3. Data Sorting 4. Data Export, Print

                After done this tutorials and you run it your output look like this.


                First, we need to install yajra/laravel-datatables-oracle package in our laravel application run by following command in terminal.


                composer require yajra/laravel-datatables-oracle

                Configure Package
                Next, configure installed package in application. so, open your config/app.php file and set insstalled package service providers and aliases.
            </div>
            <div class="post__footer">
                <p>
                    <span>{{ __('Share') }}</span>
                    <a href="https://www.facebook.com/laravelcm">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.5 35C27.165 35 35 27.165 35 17.5C35 7.83502 27.165 0 17.5 0C7.83502 0 0 7.83502 0 17.5C0 27.165 7.83502 35 17.5 35Z" fill="#3B5998"/>
                            <path d="M10.104 11.394H6.981V22.835H2.25V11.394H2.74658e-07V7.374H2.25V4.774C2.25 2.914 3.134 -6.10352e-07 7.023 -6.10352e-07L10.523 0.0150007V3.915H7.988C7.84607 3.90807 7.70437 3.93264 7.57305 3.98694C7.44174 4.04124 7.32406 4.12393 7.22848 4.22907C7.13289 4.33422 7.06176 4.45921 7.02018 4.59509C6.97861 4.73097 6.96761 4.87437 6.988 5.015V7.381H10.524L10.104 11.394Z" transform="translate(11.7959 6.79102)" fill="white"/>
                        </svg>
                    </a>
                    <a href="https://www.twitter.com/laravelcm">
                        <svg width="35" height="35" viewBox="0 0 35 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.5 35C27.165 35 35 27.165 35 17.5C35 7.83502 27.165 0 17.5 0C7.83502 0 0 7.83502 0 17.5C0 27.165 7.83502 35 17.5 35Z" fill="#55ACEE"/>
                            <path d="M20.392 1.95892C19.6294 2.29697 18.8204 2.51876 17.992 2.61692C18.8659 2.0945 19.5199 1.27202 19.832 0.302923C19.011 0.790186 18.1127 1.13347 17.176 1.31792C16.5452 0.647462 15.711 0.203574 14.8026 0.0549409C13.8941 -0.0936922 12.9619 0.0612162 12.1504 0.495695C11.3388 0.930173 10.693 1.62 10.313 2.45845C9.93294 3.29689 9.83981 4.23722 10.048 5.13392C8.38469 5.05073 6.75748 4.61858 5.27206 3.86553C3.78665 3.11249 2.47626 2.0554 1.426 0.762922C0.891121 1.68387 0.727202 2.77401 0.967589 3.81154C1.20798 4.84906 1.83461 5.75604 2.72 6.34792C2.05584 6.32729 1.40632 6.14759 0.826001 5.82392C0.826001 5.84192 0.826001 5.85992 0.826001 5.87692C0.826478 6.84259 1.16089 7.77838 1.77255 8.52564C2.38421 9.2729 3.23547 9.78563 4.182 9.97692C3.56599 10.1442 2.91996 10.1688 2.293 10.0489C2.56104 10.8792 3.08177 11.6051 3.78242 12.125C4.48308 12.6449 5.32865 12.933 6.201 12.9489C4.44475 14.3247 2.21543 14.9495 3.8147e-07 14.6869C1.79793 15.8379 3.87238 16.4841 6.0059 16.5576C8.13943 16.6312 10.2535 16.1295 12.1264 15.1051C13.9993 14.0807 15.5622 12.5713 16.6512 10.7351C17.7402 8.899 18.3152 6.80372 18.316 4.66892C18.316 4.48792 18.316 4.30692 18.304 4.12792C19.1234 3.53639 19.8305 2.8032 20.392 1.96292V1.95892Z" transform="translate(7.82788 10.6182)" fill="#F1F2F2"/>
                        </svg>
                    </a>
                </p>
            </div>
        </article>

    </div>
    <div class="post_pagination">
        <div class="container">
            <a href="javascript:;" class="pagination__left">
                <svg id="icon-arrow-thin-left" fill="none" viewBox="0 0 31.344 105.69" stroke="currentColor" stroke-width="3px" fill-rule="evenodd" width="100%" height="100%">
                    <path d="M29.844 2.86l-25 50 25 50"></path>
                </svg>
                <div class="pagination__content">
                    <h4>Puphpeteer: A Puppeteer bridge for PHP</h4>
                    <p>Puphpeteer by Johann Pardanaud is PHP bridge for Google Chrome&#8217;s Puppeteer headless chrome Node.js API. Learn h&hellip;</p>
                </div>
            </a>
            <a href="javascript:;" class="pagination__right">
                <svg id="icon-arrow-thin-right" fill="none" viewBox="0 0 30.69 103" stroke="currentColor" stroke-width="3px" fill-rule="evenodd" width="100%" height="100%">
                    <path d="M4.19 1.51l25 50-25 50"></path>
                </svg>
                <div class="pagination__content">
                    <h4>Built with Jigsaw – the Ultimate Showcase of Web Sites Built with Jigsaw</h4>
                    <p>“Built with Jigsaw” is a gallery of websites made with Jigsaw, and includes helpful articles about using…</p>
                </div>
            </a>
        </div>
    </div>

@endsection
