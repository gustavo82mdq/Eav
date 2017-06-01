<?php

namespace Gustavo82mdq\Eav\app\Models;

use Backpack\CRUD\CrudTrait;
use Illuminate\Support\Facades\DB;
use Gustavo82mdq\Eav\app\Models\EntityType;

class Attribute extends \Rinvex\Attributable\Models\Attribute
{
    use CrudTrait;

        /*
    |--------------------------------------------------------------------------
    | GLOBAL VARIABLES
    |--------------------------------------------------------------------------
    */

    //protected $table = 'attributes';
    //protected $primaryKey = 'id';
    // public $timestamps = false;
    // protected $guarded = ['id'];
    // protected $fillable = [];
    // protected $hidden = [];
    // protected $dates = [];
    protected $casts = [
        'name' => 'array',
        'description' => 'array'
    ];

    /*
    |--------------------------------------------------------------------------
    | FUNCTIONS
    |--------------------------------------------------------------------------
    */
    /**
     * Get the entities attached to this attribute.
     *
     * @return \Illuminate\Support\Collection|null
     */
    public function getEntitiesAttribute()
    {
        $res = DB::table(config('rinvex.attributable.tables.attribute_entity'))->where('attribute_id', $this->getKey())->get()->pluck('entity_type')->toArray();
        return EntityType::whereIn('id', $res)->get();
    }

    public static function types() {
        $types = app('rinvex.attributable.types')->all();
        $res = array();
        foreach ($types as $type) {
            $res[$type] = str_replace('.php', '', last(explode('\\', $type)));
        }
        return $res;
    }


    /*
    |--------------------------------------------------------------------------
    | RELATIONS
    |--------------------------------------------------------------------------
    */

    public function entity_types() {
        return $this->belongsToMany('Gustavo82mdq\Eav\app\Models\EntityType', 'attribute_entity', 'attribute_id', 'entity_type');
    }

    /*
    |--------------------------------------------------------------------------
    | SCOPES
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | ACCESORS
    |--------------------------------------------------------------------------
    */

    /*
    |--------------------------------------------------------------------------
    | MUTATORS
    |--------------------------------------------------------------------------
    */
}
