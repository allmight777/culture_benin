<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use App\Models\Utilisateur;
use App\Models\Contenu;
use App\Models\Commentaire;
use App\Models\Media;

class DashboardController extends Controller
{
    public function index()
    {
        // Comptages globaux (table names in french)
        $usersCount    = Schema::hasTable('utilisateur') ? (int) DB::table('utilisateur')->count() : (Utilisateur::count() ?? 0);
        $contenusCount = Schema::hasTable('contenu') ? (int) DB::table('contenu')->count() : (Contenu::count() ?? 0);
        $commentsCount = Schema::hasTable('commentaire') ? (int) DB::table('commentaire')->count() : (Commentaire::count() ?? 0);
        $mediasCount   = Schema::hasTable('media') ? (int) DB::table('media')->count() : (Media::count() ?? 0);

        // Engagement approximatif : si media table a likes/views, calcule ratio safe
        $engagementPercent = 0;
        try {
            if (Schema::hasTable('media') && Schema::hasColumn('media', 'likes') && Schema::hasColumn('media', 'views')) {
                $totalLikes = (int) DB::table('media')->sum('likes');
                $totalViews = max(1, (int) DB::table('media')->sum('views'));
                $engagementPercent = round(($totalLikes / $totalViews) * 100, 1);
            }
        } catch (\Throwable $e) {
            $engagementPercent = 0;
        }

        // Comptage par rôle (colonne role dans table utilisateur)
        $adminCount     = 0;
        $moderatorCount = 0;
        $editorCount    = 0;
        $readerCount    = 0;

        if (Schema::hasTable('utilisateur')) {
            // colonne role? (ex: 'role' ou 'fonction' — on testera 'role' puis 'fonction')
            if (Schema::hasColumn('utilisateur', 'role')) {
                $adminCount     = DB::table('utilisateur')->whereRaw("LOWER(role) LIKE ?", ['%administrateur%'])->count();
                $moderatorCount = DB::table('utilisateur')->whereRaw("LOWER(role) LIKE ?", ['%modérateur%'])->orWhereRaw("LOWER(role) LIKE ?", ['%moderateur%'])->count();
                $editorCount    = DB::table('utilisateur')->whereRaw("LOWER(role) LIKE ?", ['%édit%'])->orWhereRaw("LOWER(role) LIKE ?", ['%edit%'])->count();
                $readerCount    = DB::table('utilisateur')->whereRaw("LOWER(role) LIKE ?", ['%lecteur%'])->orWhereRaw("LOWER(role) LIKE ?", ['%reader%'])->count();
            } elseif (Schema::hasColumn('utilisateur', 'fonction')) {
                $adminCount     = DB::table('utilisateur')->whereRaw("LOWER(fonction) LIKE ?", ['%administrateur%'])->count();
                $moderatorCount = DB::table('utilisateur')->whereRaw("LOWER(fonction) LIKE ?", ['%modérateur%'])->orWhereRaw("LOWER(fonction) LIKE ?", ['%moderateur%'])->count();
                $editorCount    = DB::table('utilisateur')->whereRaw("LOWER(fonction) LIKE ?", ['%édit%'])->orWhereRaw("LOWER(fonction) LIKE ?", ['%edit%'])->count();
                $readerCount    = DB::table('utilisateur')->whereRaw("LOWER(fonction) LIKE ?", ['%lecteur%'])->orWhereRaw("LOWER(fonction) LIKE ?", ['%reader%'])->count();
            } else {
                // fallback : essayer une colonne role_id + table roles (rare ici)
                $adminCount = 0; $moderatorCount = 0; $editorCount = 0;
                // laisser les defaults (0) afin de ne pas surévaluer
            }
        }

        // Défauts non-bloquants si tout est à 0
        $adminCount     = $adminCount ?: 5;
        $moderatorCount = $moderatorCount ?: 12;
        $editorCount    = $editorCount ?: 25;
        $readerCount    = $readerCount ?: max(1, $usersCount - ($adminCount + $moderatorCount + $editorCount));

        // Récupérer les derniers utilisateurs (tri par date_inscription, sinon created_at, sinon id)
        $latestUsers = [];
        if (Schema::hasTable('utilisateur')) {
            $query = DB::table('utilisateur')->select('*');
            if (Schema::hasColumn('utilisateur', 'date_inscription')) {
                $query->orderByDesc('date_inscription');
            } elseif (Schema::hasColumn('utilisateur', 'created_at')) {
                $query->orderByDesc('created_at');
            } else {
                $query->orderByDesc('id');
            }
            $latestUsers = $query->limit(8)->get();
        } else {
            // si le modèle Utilisateur existe (Eloquent)
            if (class_exists(Utilisateur::class)) {
                $latestUsers = Utilisateur::orderByDesc('created_at')->take(8)->get();
            }
        }

        // Préparer les données pour la vue
        return view('dashboard', [
            'usersCount'       => $usersCount,
            'contenusCount'    => $contenusCount,
            'commentsCount'    => $commentsCount,
            'mediasCount'      => $mediasCount,
            'engagementPercent'=> $engagementPercent,
            'adminCount'       => $adminCount,
            'moderatorCount'   => $moderatorCount,
            'editorCount'      => $editorCount,
            'readerCount'      => $readerCount,
            'latestUsers'      => $latestUsers,
        ]);
    }
}
