<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TahunAkademik extends Model
{
    use HasFactory;
    protected $table = 'tahun_akademiks';
    protected $fillable = ['name', 'status', 'creator', 'modifier'];

    public function getCreatedAttribute()
    {
        if (!is_null($this->attributes['created_at'])) {
            return Carbon::parse($this->attributes['created_at'])->format('Y-m-d H:i:s');
        }
    }

    public function getUpdateAttribute()
    {
        if (!is_null($this->attributes['update_at'])) {
            return Carbon::parse($this->attributes['update_at'])->format('Y-m-d H:i:s');
        }
    }

    public function getTahunAkademikAktif()
    {
        return TahunAkademik::where('status', 'Aktif')->first();
    }
}
