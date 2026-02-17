<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\Activitylog\LogOptions;
use Spatie\Activitylog\Traits\LogsActivity;

class Student extends Model
{
    use HasFactory;
    use LogsActivity;

    protected $fillable = [
        'dni',
        'nombres',
        'apellidos',
        'correo',
        'telefono',
        'programa',
        'nivel',
    ];

    public function academicHistories(): HasMany
    {
        return $this->hasMany(AcademicHistory::class);
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['dni', 'nombres', 'apellidos', 'correo', 'telefono', 'programa', 'nivel'])
            ->logOnlyDirty()
            ->useLogName('students');
    }
}
