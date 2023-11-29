<?php

namespace App\Models;

use App\Models\Subject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OptionSubject extends Model
{
    use HasFactory;

    protected $fillable = ['subject_id', 'order'];

    public function subject() : BelongsTo
    {
        return $this->belongsTo(Subject::class);
    }
}
