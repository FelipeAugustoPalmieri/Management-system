<?php

namespace App\Http\Controllers;

use OwenIt\Auditing\Models\Audit;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function showAudits()
    {
        // Pega os logs de auditoria mais recentes e os pagina
        $audits = Audit::latest()->paginate(10);
        return view('audits.index', compact('audits'));
    }
}
