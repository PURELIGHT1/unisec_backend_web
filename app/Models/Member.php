<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';
    protected $fillable = ['name', 'npm', 'emailStudents', 'noHp', 'line', 'angkatan', 'id_prodi', 'id_ta', 'id_div', 'status', 'creator', 'modifier'];

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

    public function prodi()
    {
        return $this->belongsTo('App\Prodi', 'id_prodi');
    }

    public function ta()
    {
        return $this->belongsTo('App\TahunAkademik', 'id_ta');
    }

    public function divisi()
    {
        return $this->belongsTo('App\Divisi', 'id_div');
    }

    public static function ml()
    {
        return self::where('id_div', 1)->where('status', 'Aktif')->count();
        // DB::select('SELECT COUNT(id) AS anggota_ml FROM members  WHERE id_div = 1 AND status = "Aktif"');
    }

    public static function pubgm()
    {
        return self::where('id_div', 2)->where('status', 'Aktif')->count();
    }

    public static function dota2()
    {
        return self::where('id_div', 3)->where('status', 'Aktif')->count();
    }

    public static function valo()
    {
        return self::where('id_div', 4)->where('status', 'Aktif')->count();
    }

    public static function memberRelasi()
    {
        return DB::select('SELECT members.*, prodis.name as prodi_name, tahun_akademiks.name as ta_name, divisis.name as div_name, users.name as pembuat FROM members JOIN prodis ON members.id_prodi = prodis.id JOIN tahun_akademiks ON members.id_ta = tahun_akademiks.id JOIN divisis ON members.id_div = divisis.id JOIN users ON members.creator = users.id');
    }

    public static function memberRelasiById($id)
    {
        return DB::select('SELECT members.*, prodis.name as prodi_name, tahun_akademiks.name as ta_name, divisis.name as div_name FROM members JOIN prodis ON members.id_prodi = prodis.id JOIN tahun_akademiks ON members.id_ta = tahun_akademiks.id JOIN divisis ON members.id_div = divisis.id WHERE members.id = ?', [$id]);
    }

    public static function pembuat()
    {
        return DB::select('SELECT members.*, divisis.name as div_name, users.name as pembuat FROM members JOIN divisis ON members.id_div = divisis.id JOIN users ON members.creator = users.id WHERE members.creator > 1');
    }


    public static function cekAnggota($npm)
    {
        return DB::select('SELECT * FROM members WHERE members.npm = ?', [$npm]);
    }
}
