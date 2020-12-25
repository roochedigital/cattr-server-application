<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Setting
 *
 * @property int $id
 * @property string $module_name
 * @property string $key
 * @property string $value
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Setting newModelQuery()
 * @method static Builder|Setting newQuery()
 * @method static Builder|Setting query()
 * @method static Builder|Setting whereCreatedAt($value)
 * @method static Builder|Setting whereId($value)
 * @method static Builder|Setting whereKey($value)
 * @method static Builder|Setting whereModuleName($value)
 * @method static Builder|Setting whereUpdatedAt($value)
 * @method static Builder|Setting whereValue($value)
 * @mixin Eloquent
 */
class Setting extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'module_name',
        'key',
        'value'
    ];

    /**
     * @var array
     */
    protected $casts = [
        'value' => 'string',
        'work_time' => 'int',
        'language' => 'string',
        'timezone' => 'timezone',
        'color' => 'json',
    ];

    /**
     * Casts the values of the value column by key.
     *
     * @param string $key
     * @return mixed|string
     */
    protected function getCastType($key)
    {
        if ($key == 'value' && !empty($this->casts[$this->key])) {
            return $this->casts[$this->key];
        }

        return parent::getCastType($key);
    }
}