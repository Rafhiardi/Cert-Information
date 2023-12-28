<?php

namespace App\Models\Cert;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelCert extends Model
{
    use HasFactory;

    protected $table = "data_cert";

    protected $fillable = [
        "token",
        "nama",
        "skema",
        "nomor_sertifikasi",
        "masa_aktif",
        "file_cert"

    ];
}
