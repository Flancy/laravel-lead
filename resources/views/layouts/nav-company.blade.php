<div class="col-sm-3 company-nav">
    <div class="panel panel-info">
        <div class="panel-heading"></div>

        <div class="panel-body">
            <ul class="list-group">
                <a href="#leads" class="list-group-item" data-toggle="collapse">
                    <i class="fa fa-caret-right" aria-hidden="true"></i></i>Заявки
                    @if(isset($leads))
                        <span class="badge">
                            {{ count($leads) }}
                        </span>
                    @endif
                </a>
                <div class="list-group collapse" id="leads">
                    <a href="#all-leads" class="list-group-item">
                        Все
                        @if(isset($leads))
                            <span class="badge">
                                {{ count($leads) }}
                            </span>
                        @endif
                    </a>
                    <a href="#buy-leads" class="list-group-item">
                        Купленные <span class="badge">0<span>
                    </a>
                </div>

                <a href="/settings" class="list-group-item">Настройки</a>
            </ul>
        </div>
    </div>
</div>
