@extends('site.layouts.master')

@section('content')
    @include('site.vendor.pageHeader', [
        'page' => 'Новости',
    ])

    <section class="blog-section style-four section">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12 col-xs-12">
                    <div class="left-side">
                        @foreach ($blogs as $blog)
                            <div class="item-holder">
                                <div class="image-box">
                                    <figure>
                                        <a href="{{ $blog->getShowcaseUrl() }}">
                                            <img src="images/blog/5.jpg" alt="{{ $blog->name }}">
                                        </a>
                                    </figure>
                                </div>
                                <div class="content-text">
                                    <a href="{{ $blog->getShowcaseUrl() }}">
                                        <h6>{{ $blog->name }}</h6>
                                    </a>
                                    <span>{{ $blog->author->surname }} {{ $blog->author->name }} / {{ $blog->updated_at }}</span>
                                    <p>{{ $blog->reduction($blog->content, 300) }}</p>
                                    <div class="link-btn">
                                        <a href="{{ $blog->getRoute(isset($currentCategory) ? ['category_id' => $currentCategory->id] : ['']) }}" class="btn-style-one">Подробнее</a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                @include('site.blog.right_side')
            </div>

            <div class="styled-pagination">
                {{ $blogs->links('site.vendor.pagination.custom') }}
            </div>
        </div>
    </section>
@endsection
