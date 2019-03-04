<div class="tile" id="widget-panel">
    <h4 class="line-head">Настройки виджета</h4>

    <div class="tile-body">
        <form class="form-horizontal widget-settings-form" id="form-widget-panel" action="{{ route('widget.save', $widget) }}">
            {{ csrf_field() }}

            <div class="form-group row">
                <label class="control-label col-md-4" for="title">Заголовок:</label>
                <div class="col-md-8">
                    <input
                            id="title"
                            name="title"
                            data-setting="title"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="subtitle">Подзаголовок:</label>
                <div class="col-md-8">
                    <input
                            id="subtitle"
                            name="subtitle"
                            data-setting="subtitle"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->subtitle ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="button_title">Надпись на кнопке:</label>
                <div class="col-md-8">
                    <input
                            id="button_title"
                            name="button_title"
                            data-setting="button_title"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->button_title ?? '' }}">
                </div>
            </div>

            <div class="form-group row">
                <label class="control-label col-md-4" for="button_link">Ссылка для кнопки:</label>
                <div class="col-md-8">
                    <input
                            id="button_link"
                            name="button_link"
                            data-setting="button_link"
                            class="form-control widget-setting"
                            type="text"
                            value="{{ $widget_setting->button_link ?? '' }}">
                </div>
            </div>

            <div id="accordionExample" class="accordion">
                @foreach(data_get($widget_setting, 'items', []) as $setting)
                    @include('miracle.widgets.About.block', ['position' => $loop->iteration])
                @endforeach
            </div>

            <div class="tile-footer">
                <button class="btn btn-primary" type="button" href="{{ route('widget.addBlock', $widget) }}" id="add_block">
                    <i class="fas fa-plus-circle mr-2"></i>Добавить
                </button>
                <button class="btn btn-default save-settings" disabled>
                    <i class="fas fa-check-circle mr-2"></i>Сохранить
                </button>
            </div>
        </form>
    </div>
</div>