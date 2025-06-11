<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Notification;
use App\Models\Order;
use App\Models\Service;

use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function create()
    {
        return view('clients.contact');  // ou 'contact.blade.php' selon votre arborescence
    }
    /**
     * Stocke un nouveau message de contact.
     */
    // public function store(Request $request)
    // {
    //     // Validation des données

    //     $data = $request->validate([
    //         'name'    => 'required|string|max:255',
    //         'email'   => 'required|email|max:255',
    //         'phone'   => 'nullable|string|max:20',
    //         'subject' => 'required|in:service-information,order-question,price-quote,feedback,complaint,partnership,other',
    //         'message' => 'required|string',
    //         'privacy' => 'accepted',
    //     ]);

    //     // Enregistrement en base
    //     Message::create($data);

    //     // Si le formulaire est soumis via AJAX (fetch, axios…), on renvoie du JSON
    //     if ($request->wantsJson()) {
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Votre message a bien été envoyé.',
    //         ]);
    //     }

    //     // Sinon on redirige et on stocke un flash message
    //     return redirect()
    //         ->back()
    //         ->with('success', 'Votre message a bien été envoyé. Nous vous répondrons bientôt.');
    // }

    public function store(Request $request)
    {
        // Validation des données
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'required|in:service-information,order-question,price-quote,feedback,complaint,partnership,other',
            'message' => 'required|string',
            'privacy' => 'accepted',
        ]);

        // Transformer la valeur 'on' de privacy en entier 1
        $data['privacy'] = 1; // Puisque validation accepted signifie que c'est accepté, on met 1

        // Enregistrement en base
        Message::create($data);

        // Réponse JSON si AJAX
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Votre message a bien été envoyé.',
            ]);
        }

        // Sinon redirection avec message flash
        return redirect()
            ->back()
            ->with('success', 'Votre message a bien été envoyé. Nous vous répondrons bientôt.');
    }


    public function index()
    {
        $messages = Message::orderBy('created_at', 'desc')
            ->paginate(15);

        return view('admins.contact.index', compact('messages'));
    }

    /**
     * Renvoie le détail d’un message pour le modal via AJAX.
     */
    public function show(Message $contact)
    {
        $html = view('admin.contact.partials.show', ['contact' => $contact])->render();
        return response()->json(['html' => $html]);
    }

    /**
     * Supprime un message.
     */
    public function destroy(Message $contact)
    {
        $contact->delete();
        return redirect()->route('contact.index')
            ->with('success', 'Message supprimé avec succès.');
    }
}
