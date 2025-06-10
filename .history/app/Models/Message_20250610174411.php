<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
}
// app/Http/Controllers/ContactController.php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'phone'   => 'nullable|string|max:20',
            'subject' => 'required|in:service-information,order-question,price-quote,feedback,complaint,partnership,other',
            'message' => 'required|string',
            'privacy' => 'accepted',
        ]);

        Message::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Votre message a bien été enregistré.',
        ]);
    }
}
