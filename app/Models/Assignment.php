<?php

namespace App\Models;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory;

    public function complete()
    {
        $this->completed_at = Carbon::now();
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class)
    }
}
