<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as IlluminateModel;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Pluralizer;

use App\Interfaces\Sluggable;
use App\Interfaces\Validatable;

abstract class Model extends IlluminateModel implements Validatable,Sluggable
{
    protected $search;

    public static function slug(bool $plural = false): string
    {
        $slugArray = explode('\\', static::class);
        $slugString = array_pop($slugArray);
        $slug = strtolower(preg_replace('/(?<!^)[A-Z]/', '_$0', $slugString));
        if($plural) {
            return Pluralizer::plural($slug);
        }
        return $slug;
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

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
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
