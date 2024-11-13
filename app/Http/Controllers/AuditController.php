<?php

namespace App\Http\Controllers;

use OwenIt\Auditing\Models\Audit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuditController extends Controller
{
    public function showAudits()
    {
        // Pega os logs de auditoria apenas do usuário autenticado
        $userId = Auth::id(); // Obtém o ID do usuário logado
        $audits = Audit::where('user_id', $userId)->latest()->paginate();

        return view('audits.index', compact('audits'));
    }
}
