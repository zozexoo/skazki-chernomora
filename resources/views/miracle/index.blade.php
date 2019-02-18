@extends('miracle.layouts.master')

@section('slider')
    @foreach(array_get($pageWidgets, 'top', []) as $widget)
        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
    @endforeach
@endsection

@section('content')
    @foreach(array_get($pageWidgets, 'middle', []) as $widget)
        @widget('miracle.' . $widget->class_name, ['widget' => $widget])
    @endforeach

    @include('miracle.vendor.sections.blog')
    @include('miracle.vendor.sections.colors_section')

    <div class="parallax has-caption parallax-image2" data-stellar-background-ratio="0.5">
        <div class="caption-wrapper">
            <h2 class="caption animated size-lg" data-animation-type="fadeInLeft" data-animation-duration="2" data-animation-delay="0">Whatever You Do Give Your Best!</h2>
            <br>
            <h3 class="caption animated size-md" data-animation-type="fadeInLeft" data-animation-duration="2" data-animation-delay="1">welcome to parallax scrolling</h3>
        </div>
    </div>

    @include('miracle.vendor.sections.multi_box')
    @include('miracle.vendor.sections.responsive')
    @include('miracle.vendor.sections.reviews')
@endsection