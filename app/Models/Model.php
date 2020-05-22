<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;
use App\Interfaces\Validatable;

abstract class Model extends IlluminateModel implements Validatable
{
    protected $search;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public static function paginate(int $pageCount)
    {
        if(!is_null(request()->q)) {
            return self::search(request()->q)->paginate($pageCount);
        }

        return parent::query()->paginate($pageCount);
    }


    /**
     * Get all of the models from the database.
     *
     * @param  array|mixed  $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public static function all($columns = ['*'])
    {
        if(!is_null(request()->q)) {
            $b = self::search(request()->q)->get($columns);
            return $b;
        }

        return parent::all($columns);
    }

    public function scopeSearch(Builder $builder, string $phrase) {
        if(empty($this->search)) {
            $this->search = Schema::getColumnListing(self::getTable());
        }

        foreach($this->search as $column) {
            $builder->orWhere($column, 'LIKE', "%$phrase%");
        }
    }
}
