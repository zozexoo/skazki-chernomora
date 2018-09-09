@extends('admin.layouts.master')

@section('content')
    @include('admin.vendor.pageHeader', [
        'section' => 'Новости',
        'description' => 'Добавление и редактирование новостей',
        'page' => 'Список новостей'
    ])

    <div class="row">
        <div class="col-md-12 blog-articles">
            <div class="tile">
                <div class="tile-body">
                    <div class="row" style="margin-bottom: 20px;">
                        <div class="col-md-6 col-lg-3">
                            <button data-href="{{ route('admin.blog.article.create') }}" class="btn btn-primary open-create-form" type="button">
                                <i class="fas fa-plus-circle"></i> Добавить
                            </button>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="far fa-file-alt"></i>
                                </div>
                                <div class="info">
                                    <p class="enable-news-count"><b>{{ array_get($counters, 'enable_news_count', 0) }}</b></p>
                                    <p>статей онлайн</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3">
                            <div class="widget-small primary coloured-icon">
                                <div class="circle-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <div class="info">
                                    <p class="view-count-total"><b>{{ array_get($counters, 'view_count_total', 0) }}</b></p>
                                    <p>всего просмотров</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-3" style="margin-top: 10px;">
                            <input class="form-control form-control-sm search" placeholder="Введите и нажмите Enter..." />
                        </div>
                    </div>
                </div>

                <div class="tile-body datatable-scroll-lg">
                    <table
                            class="table table-hover"
                            id="blogArticlesTable"
                            data-href="{{ route('admin.blog.article.index') }}"
                            width="100%"
                    >
                        <thead>
                        <tr>
                            <th>Создан</th>
                            <th>Наименование</th>
                            <th>Категории</th>
                            <th>Опубликован</th>
                            <th>Автор</th>
                            <th>Обновлено</th>
                            <th>Редактор</th>
                            <th>Просмотров</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="application/x-tmpl-mustache" class="template-blog-articles-table-column-created">
        @include('admin.blog.articles.columns.created')
    </script>
    <script type="application/x-tmpl-mustache" class="template-blog-articles-table-column-title">
        @include('admin.blog.articles.columns.title')
    </script>
    <script type="application/x-tmpl-mustache" class="template-blog-articles-table-column-categories">
        @include('admin.blog.articles.columns.categories')
    </script>
    <script type="application/x-tmpl-mustache" class="template-blog-articles-table-column-published">
        @include('admin.blog.articles.columns.published')
    </script>
    <script type="application/x-tmpl-mustache" class="template-blog-articles-table-column-author">
        @include('admin.blog.articles.columns.author')
    </script>
    <script type="application/x-tmpl-mustache" class="template-blog-articles-table-column-updated">
        @include('admin.blog.articles.columns.updated')
    </script>
    <script type="application/x-tmpl-mustache" class="template-blog-articles-table-column-updater">
        @include('admin.blog.articles.columns.updater')
    </script>
    <script type="application/x-tmpl-mustache" class="template-blog-articles-table-column-viewed">
        @include('admin.blog.articles.columns.viewed')
    </script>
    <script type="application/x-tmpl-mustache" class="template-blog-articles-table-column-actions">
        @include('admin.blog.articles.columns.actions')
    </script>
@endsection

@section('footer__script')
    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/dataTables.bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/mustache.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap-notify.min.js') }}"></script>
@endsection