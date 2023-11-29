<?php

namespace App\Models;

use App\Models\Student;
use App\Models\OptionSubjectItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Grade extends Model
{
    use HasFactory;
    public const TYPE_EXAM = 'E';
    public const TYPE_TEST = 'D';

    const SEMESTER_S1 = 'S1';
    const SEMESTER_S2 = 'S2';


    protected $fillable = ['student_id', 'option_subject_item_id', 'grade_type', 'value', 'semester'];

    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function subjectItem() : BelongsTo
    {
        return $this->belongsTo(OptionSubjectItem::class);
    }
}
