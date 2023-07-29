<?php

namespace App\Models;

use App\Interfaces\Validatable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Support\Facades\Schema;

abstract class Model extends IlluminateModel implements Validatable
{

    use HasFactory;

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

    public static function orderBy(string $column, string $direction = null)
    {
        if(!is_null(request()->q)) {
            return self::search(request()->q)->orderBy($column, $direction);
        }

        return parent::query()->orderBy($column, $direction);
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

    /**
     * Search for model with given substring.
     *
     * @param  array|mixed  $columns
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function scopeSearch(Builder $builder, string $phrase) {
        if(empty($this->search)) {
            $this->search = Schema::getColumnListing(self::getTable());
        }

        foreach($this->search as $column) {
            $builder->orWhere($column, 'LIKE', "%$phrase%");
        }
    }
}
