<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProgramStudi extends Model
{
    protected $table = 'program_studis';
    protected $fillable = ['kode', 'nama', 'jenjang'];
    protected $guarded = ['id'];
    
    public function mahasiswas(): HasMany
    {
        return $this->hasMany(Mahasiswa::class, 'program_studi_id');
    }
}
