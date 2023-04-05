load('ext://uibutton', 'cmd_button')

local_resource(
    name='init',
    cmd='bash -c "composer install && php artisan init"'
)

local_resource(
    name='serve',
    resource_deps=['init'],
    serve_cmd='php artisan serve'
)

cmd_button(
    'server:database-refresh',
    resource='serve',
    argv=['bash', '-c', 'touch ./database/database.sqlite && php artisan migrate:fresh'],
    text='Refresh Database'
)

local_resource(
    name='front-end',
    resource_deps=['init'],
    serve_cmd='cd resources/views/admin/angular-ui; yarn; yarn watch --base-href="/admin/"'
)

local_resource(
    name='test',
    resource_deps=['init'],
    auto_init=False,
    allow_parallel=True,
    cmd='php artisan test && cd resources/views/admin/angular-ui && ng test --watch false'
)
