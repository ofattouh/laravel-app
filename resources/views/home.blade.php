


<!-- Extend resources/views/layouts/main.blade.php -->

@extends('layouts.main')

<!-- Content of page starts here and output using directive: yield('content') -->

@section('content')

<!-- Page header with logo and tagline-->
<header class="py-5 bg-light border-bottom mb-4">
    <div class="container">
        <div class="text-center my-5">
            <h1 class="fw-bolder">Home Page</h1>
            <p class="lead mb-0">A Bootstrap 5 starter layout for your blog homepage</p>
        </div>
    </div>
</header>

<!-- Page content-->
<div class="container">
    <div class="row">

        <!-- Blog entries-->
        <div class="col-lg-8">

            <!-- Nested row for non-featured blog posts-->
            <div class="row">

                <!-- foreach loop show TestController variable $posts (Eloquent Model). Blade directives start with "@" -->
                @foreach($posts as $post)
                    <div class="col-lg-6">

                        <!-- Blog post-->
                        <div class="card mb-4">

                            <!--
                                Route Parameter: $post is passed as second argument inside route() helper which can be
                                passed as whole object: $post or explicitly passing only the ID using $post->id
                            -->
                            <a href="{{ route('post.show', $post) }}">
                                <img class="card-img-top" src="https://dummyimage.com/700x350/dee2e6/6c757d.jpg" alt="..." />
                            </a>

                            <div class="card-body">
                                <div class="small text-muted">Created at: {{ $post->created_at }}</div>
                                <div class="small text-muted">Updated at: {{ $post->updated_at }}</div><br>
                                <h2 class="card-title h4">{{ $post->title }}</h2>
                                <p class="card-text">{{ $post->text }}</p>
                                <a class="btn btn-primary" href="#">Read more →</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Side widgets-->
        <div class="col-lg-4">

            <!-- Categories widget-->
            <div class="card mb-4">
                <div class="card-header">Categories</div>

                <!-- foreach loop show TestController variable $categories. Blade directives start with "@" -->
                <div class="card-body">
                    <p class="card-text"><a href="{{ route('home') }}">All Categories</a></p>
                    <p class="card-text fw-bold">Hard-coded Categories</p>

                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                @foreach($categories as $category)
                                    <li>{{ $category }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- foreach loop show TestController variable $categoriesDB. Blade directives start with "@" -->
                <div class="card-body">
                    <p class="card-text fw-bold">Database Categories (Query Builder)</p>

                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                @foreach($categoriesDB as $category)
                                    <li><a href="{{ route('home') }}?category_id={{ $category->id }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- foreach loop show TestController variable $categoriesDB2. Blade directives start with "@" -->
                <div class="card-body">
                    <p class="card-text fw-bold">Database Categories (Eloquent Model)</p>

                    <div class="row">
                        <div class="col-sm-6">
                            <ul class="list-unstyled mb-0">
                                @foreach($categoriesDB2 as $category)
                                    <li><a href="{{ route('home') }}?category_id={{ $category->id }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content of page ends here  -->

@endsection

<!--

    // To extend main layout file, use extends Blade directive at start of this View file and provide
    location of main layout file

    // View Home will show categories data and Controller TestController will pass the data from Database
    and route it to home View

-->

<?php

    /* foreach loop show TestController variable $categories. Blade directives start with "@"
    <div class="card-body">
        <p class="card-text fw-bold">Database Categories (Compact PHP/Eloquent Model)</p>

        <div class="row">
            <div class="col-sm-6">
                <ul class="list-unstyled mb-0">
                    @foreach($categories as $category)
                        <li><a href="#">{{ $category->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    */

?>
