local_resource(
    name='init',
    cmd='php artisan init'
)

local_resource(
    name='serve',
    resource_deps=['init'],
    serve_cmd='php artisan serve'
)

local_resource(
    name='front-end',
    resource_deps=['init'],
    serve_cmd='yarn dev'
)

local_resource(
    name='admin',
    resource_deps=['init'],
    serve_cmd='cd resources/views/admin/angular-ui && yarn install && yarn watch'
)

local_resource(
    name='test',
    resource_deps=['init'],
    auto_init=False,
    allow_parallel=True,
    cmd='php artisan test && cd resources/views/admin/angular-ui && ng test --watch false'
)