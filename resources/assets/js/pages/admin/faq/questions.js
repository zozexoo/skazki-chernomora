$(function () {
    let $blogArticles = $('.blog-articles');

    if (!$blogArticles.length) {
        return;
    }

    let $blogArticlesTable = $('#blogArticlesTable');
    let mustacheTemplateBlogArticlesTableColumnCreated = $('.template-blog-articles-table-column-created').text();
    let mustacheTemplateBlogArticlesTableColumnTitle = $('.template-blog-articles-table-column-title').text();
    let mustacheTemplateBlogArticlesTableColumnCategories = $('.template-blog-articles-table-column-categories').text();
    let mustacheTemplateBlogArticlesTableColumnPublished = $('.template-blog-articles-table-column-published').text();
    let mustacheTemplateBlogArticlesTableColumnAuthor = $('.template-blog-articles-table-column-author').text();
    let mustacheTemplateBlogArticlesTableColumnUpdated = $('.template-blog-articles-table-column-updated').text();
    let mustacheTemplateBlogArticlesTableColumnUpdater = $('.template-blog-articles-table-column-updater').text();
    let mustacheTemplateBlogArticlesTableColumnViewed = $('.template-blog-articles-table-column-viewed').text();
    let mustacheTemplateBlogArticlesTableColumnActions = $('.template-blog-articles-table-column-actions').text();

    $blogArticlesTable.DataTable({
        "scrollX": true,
        language: {
            processing: "Подождите...",
            search: "Поиск:",
            lengthMenu: "Показать _MENU_ записей",
            info: "Записи с _START_ до _END_ из _TOTAL_ записей",
            infoEmpty: "Записи с 0 до 0 из 0 записей",
            infoFiltered: "(отфильтровано из _MAX_ записей)",
            infoPostFix: "",
            loadingRecords: "Загрузка записей...",
            zeroRecords: "Записи отсутствуют.",
            emptyTable: "В таблице отсутствуют данные",
            paginate: {
                first: "Первая",
                previous: "Предыдущая",
                next: "Следующая",
                last: "Последняя"
            }
        },
        ajax:
            {
                url: $blogArticlesTable.data('href'),
                // data: function (data) {
                //     $('.lists-filter-value').serializeArray().forEach(function (filter) {
                //         data[filter.name] = filter.value;
                //     });
                // },
            },
        columnDefs: [
            {
                targets: 0,
                data: 'created_at',
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnCreated, {blog}),
            },
            {
                targets: 1,
                data: 'title',
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnTitle, {blog}),
            },
            {
                targets: 2,
                sortable: false,
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnCategories, {blog}),
            },
            {
                targets: 3,
                data: 'enable',
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnPublished, {blog}),
            },
            {
                targets: 4,
                data: 'author_id',
                sortable: false,
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnAuthor, {blog}),
            },
            {
                targets: 5,
                data: 'updated_at',
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnUpdated, {blog}),
            },
            {
                targets: 6,
                data: 'updater_id',
                sortable: false,
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnUpdater, {blog}),
            },
            {
                targets: 7,
                data: 'view_count',
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnViewed, {blog}),
            },
            {
                targets: 8,
                orderable: false,
                render: (data, type, blog) => Mustache.render(mustacheTemplateBlogArticlesTableColumnActions, {blog}),
            },
        ],
        lengthMenu: [15, 25, 50, 75, 100],
        displayLength: 15,
    });

    $(document).on('change', '.checkbox', function () {
        $.ajax({
            url: $(this).data('href'),
            type: 'post',
            success: (response) => {
                $.notify({
                    title: "Успех!",
                    message: response.message,
                    icon: 'fa fa-check'
                }, {
                    type: "info",
                    placement: {
                        from: "top",
                        align: "right",
                    },
                });
            },
            error: function (data) {
                console.log(data);
            }
        });
    });

    $(document).on('click', '.blog-article-delete', function (e) {
        e.preventDefault();
        let $this = $(this);

        swal({
            title: "Подтвердите удаление",
            text: "Вы действительно хотите удалить статью?",
            icon: "warning",
            buttons: ["Отмена", "Да, удалить"],
            dangerMode: true,
        }).then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    type: 'delete',
                    url: $this.attr('href'),
                    success: response => {
                        $.notify({
                            title: "Успех!",
                            message: response.message,
                            icon: 'fa fa-check'
                        }, {
                            type: "danger",
                            placement: {
                                from: "top",
                                align: "right",
                            },
                        });

                        $blogArticlesTable.DataTable().ajax.reload();
                    },
                    error: xhr => {
                        console.error(xhr);
                    },
                });

                swal("Удаление подтверждено!", "Статья будет удалена.", "success");
            } else {
                swal("Удаление отменено!", "Статья не будет удалена.", "error");
            }
        });
    });
});
