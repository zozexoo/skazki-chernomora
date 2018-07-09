<div class="tile">
    <h3 class="tile-title">Категория</h3>
    <div class="tile-body">
        <form
                class="form-horizontal faq-category-settings-form"
                action="{{ route('admin.faq.category.save', $category ?? '') }}"
                method="post"
        >
            <div class="form-group row">
                <label class="control-label col-md-4">Имя для списка:</label>
                <div class="col-md-8">
                    <input name="title" class="form-control" type="text" value="{{ $category->title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4">Название категории:</label>
                <div class="col-md-8">
                    <input name="name" class="form-control" type="text" value="{{ $category->name ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4">Метатег TITLE:</label>
                <div class="col-md-8">
                    <input name="meta_title" class="form-control" type="text" value="{{ $category->meta_title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4">Метатег DESCRIPTION:</label>
                <div class="col-md-8">
                    <input name="meta_description" class="form-control" type="text" value="{{ $category->meta_description ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4">Метатег KEYWORDS:</label>
                <div class="col-md-8">
                    <input name="meta_keywords" class="form-control" type="text" value="{{ $category->meta_keywords ?? '' }}">
                </div>
            </div>

            <div class="tile-footer">
                <button class="btn btn-default" type="submit" disabled>
                    <i class="fa fa-fw fa-lg fa-check-circle"></i>Сохранить
                </button>
            </div>
        </form>
    </div>
</div>
