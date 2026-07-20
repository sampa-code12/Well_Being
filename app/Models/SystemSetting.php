<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;

class SystemSetting extends Model
{
    protected $table = 'system_settings';

    protected $fillable = [
        'key',
        'value',
    ];

    protected static array $memorySettings = [];

    public static function getValue(string $key, $default = null)
    {
        if (!Schema::hasTable((new static)->getTable())) {
            return static::$memorySettings[$key] ?? $default;
        }

        try {
            $setting = static::where('key', $key)->first();

            return $setting ? $setting->value : $default;
        } catch (\Throwable $e) {
            return static::$memorySettings[$key] ?? $default;
        }
    }

    public static function getBool(string $key, bool $default = true): bool
    {
        $value = static::getValue($key, $default ? '1' : '0');

        return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE) ?? $default;
    }

    public static function setValue(string $key, $value): void
    {
        if (!Schema::hasTable((new static)->getTable())) {
            static::$memorySettings[$key] = $value;

            return;
        }

        try {
            static::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        } catch (\Throwable $e) {
            static::$memorySettings[$key] = $value;
        }
    }
}
