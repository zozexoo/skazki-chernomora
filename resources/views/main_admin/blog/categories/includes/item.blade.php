<div
        class="blog-categories-list-item"
        data-blog-category-id="{{ $category->id }}"
        style="margin-bottom: 10px;display: flex;justify-content: space-between;flex-wrap: wrap;"
>
    <div class="toggle-flip" style="display: flex;justify-content: flex-start;flex-wrap: wrap;">
        <label style="margin-right: 15px;">
            <input
                    class="checkbox"
                    type="checkbox"
                    data-href="{{ route('admin.blog.category.enable', $category) }}"
                    @if ($category->enable) checked @endif
            ><span class="flip-indecator" data-toggle-on="Вкл" data-toggle-off="Выкл"></span>
        </label>

        <p class="title dragula-handle">{{ $category->title }}</p>
    </div>

    <div class="btn-group">
        <a class="btn btn-primary dragula-handle" href="#">
            <i class="fas fa-arrows-alt dragula-handle" style="vertical-align: middle;"></i>
        </a>

        <a
            class="btn btn-primary blog-category-settings-open"
            href="{{ route('admin.blog.category.edit', $category) }}"
        ><i class="fa fa-lg fa-edit"></i></a>

        <a
            class="btn btn-primary blog-category-delete"
            href="{{ route('admin.blog.category.delete', $category) }}"
        ><i class="fa fa-lg fa-trash"></i></a>
    </div>
</div>