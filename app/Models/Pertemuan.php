<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pertemuan extends Model
{
    use HasFactory;
    protected $table = 'pertemuans';
    protected $fillable = ['name', 'tanggal', 'jam_mulai', 'jam_selesai', 'status', 'creator', 'modifier'];

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

    public static function getPertemuanAktif()
    {
        $tanggal = Carbon::parse(now())->format('Y-m-d');

        $jam = date('H:i:s', strtotime('+7 hour', strtotime(date('H:i:s'))));
        $pertemuan = DB::select("SELECT * FROM pertemuans WHERE tanggal = '$tanggal'");

        return [$pertemuan, $jam];
    }

    public static function getPertemuanCurrent()
    {
        $pertemuan = DB::select("SELECT * FROM pertemuans ORDER BY tanggal DESC LIMIT 1");

        return $pertemuan;
    }
}
