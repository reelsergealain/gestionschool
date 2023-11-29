<?php

namespace App\Models;

use App\Models\Option;
use App\Models\OptionSubject;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OptionSubjectItem extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'option_id', 'subject_id', 'order', 'coefficient', 'max'];

    public function option() : BelongsTo
    {
        return $this->belongsTo(Option::class);
    }

    public function option_subject() : BelongsTo
    {
        return $this->belongsTo(OptionSubject::class);
    }
}
