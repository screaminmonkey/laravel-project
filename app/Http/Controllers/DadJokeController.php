<?php
namespace App\Http\Controllers;

use App\Models\DadJoke;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DadJokeController extends Controller
{
      public function index(Request $request)
    {
        $search = $request->input('search');

        if ($search) {
            $jokes = DadJoke::where('joke', 'LIKE', "%{$search}%")
                            ->orWhere('comment', 'LIKE', "%{$search}%")
                            ->latest()
                            ->get();
        } else {
            $jokes = DadJoke::latest()->get();
        }

        return view('dad-jokes', compact('jokes', 'search'));
    }
    
    public function fetch()
    {
        $response = Http::withHeaders([
            'Accept' => 'application/json',
        ])->get('https://icanhazdadjoke.com/');

        $joke = $response->json()['joke'];

        DadJoke::create([
            'joke' => $joke
        ]);

        return redirect('/dad-jokes');
    }

    public function show()
    {
        $jokes = DadJoke::latest()->get();

        return view('dad-jokes', compact('jokes'));
    }

   public function addComment(Request $request) {
        $incomingFields = $request->validate([
            'comment' => 'required',
        ]);

        $incomingFields['comment'] = strip_tags($incomingFields['comment']);
        $incomingFields['user_id'] = auth()->id();

        DadJoke::create($incomingFields);

        return redirect('/dad-jokes');
    }
}



