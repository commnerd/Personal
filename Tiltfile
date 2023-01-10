local_resource(
    name='init',
    cmd='php artisan init'
)

local_resource(
    name='serve',
    deps=['init'],
    serve_cmd='php artisan serve'
)

local_resource(
    name='test',
    deps=['init'],
    auto_init=False,
    allow_parallel=True,
    cmd='php artisan test'
)