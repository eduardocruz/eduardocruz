<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Spark\LocalInvoice;

class NotaFiscal extends Model
{
    protected $table = 'notas_fiscais';

    public function invoice()
    {
        return $this->belongsTo(LocalInvoice::class);
    }

    protected $dates = [
        'emitted_at',
    ];
}
