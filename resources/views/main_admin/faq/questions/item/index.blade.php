@extends('main_admin.layouts.master')

@section('content')
    @include('main_admin.vendor.pageHeader', [
        'section' => 'Вопросы',
        'page' => 'Настройка вопроса'
    ])

    <div class="row">
        <div class="col-md-12 faq-item">
            @include('main_admin.faq.questions.item.settings')
        </div>
    </div>

    <script type="text/template" class="faq-item-settings-loading-template">
        @include('main_admin.faq.questions.item.loading')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('vali-admin/plugins/tinymce/tinymce.min.js') }}"></script>
@endsection