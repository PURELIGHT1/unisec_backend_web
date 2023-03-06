<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Absensi extends Model
{
    use HasFactory;
    protected $table = 'absensis';
    protected $fillable = ['name', 'npm', 'bukti', 'status', 'creator', 'modifier'];

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

    public static function getNama($npm)
    {
        return DB::select('SELECT divisis.name as div_nama, members.* FROM members JOIN divisis ON members.id_div = divisis.id WHERE members.npm = ?', [$npm]);
    }

    public static function cekNpm($npm, $nama_pert)
    {
        return DB::select('SELECT * FROM absensis WHERE absensis.npm = ? and absensis.name = ?', [$npm, $nama_pert]);
    }

    public static function getAbsensiExcel()
    {
        return DB::select('SELECT members.name as nama_mhs, absensis.npm as npm_mhs, divisis.name as div_nama, absensis.status as status, SUM(absensis.status = "Hadir")hadir, SUM(absensis.status = "Izin")izin, SUM(absensis.status = "Alfa")alfa, SUM(absensis.status = "Sakit")sakit, SUM(absensis.status = "Belum Absen")pending FROM absensis JOIN members ON absensis.npm = members.npm JOIN divisis ON members.id_div = divisis.id JOIN pertemuans ON absensis.name = pertemuans.name GROUP BY absensis.npm, members.name, divisis.name, absensis.status ORDER BY divisis.name, members.name');
    }

    public static function getAbsensiExcel2()
    {
        return DB::select('SELECT members.name as nama_mhs, divisis.name as div_nama, absensis.* FROM absensis JOIN members ON absensis.npm = members.npm JOIN divisis ON members.id_div = divisis.id ORDER BY npm ASC');
    }

    public static function getAll($pert)
    {
        return DB::select("SELECT members.name as nama_mhs, divisis.name as div_nama, absensis.* FROM absensis JOIN members ON absensis.npm = members.npm JOIN divisis ON members.id_div = divisis.id WHERE absensis.name = '$pert' ORDER BY npm ASC");
    }
}
