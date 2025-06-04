<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Affiche la liste de tous les services.
     */
    public function index()
    {
        // Utilise la pagination pour de meilleures performances si la liste est longue
        $services = Service::paginate(10); // Tu peux changer "10" selon ton besoin
        return view('admins.services.index', compact('services'));
    }

    /**
     * Affiche la page de commande pour un service donné via son slug.
     *
     * @param string $slug
     */
    public function order($slug)
    {
        // Recherche du service par slug, échoue automatiquement si non trouvé
        $service = Service::where('slug', $slug)->firstOrFail();
        return view('admins.services.order', compact('service'));
    }
}
