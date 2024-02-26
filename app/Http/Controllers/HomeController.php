<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Ramsey\Uuid\Type\Integer;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        return view('admin.home');
    }

    public function fund()
    {
        $data = Http::get('https://tor-api.onrender.com/annonces/private')->json();

        return view('admin.fund', [
            'data' => $data
        ]);
    }

    public function lost()
    {
        $data = Http::get('https://tor-api.onrender.com/annonces/public')->json();
        return view('admin.lost', [
            'data' => $data
        ]);
    }

    public function info(int $annonce)
    {
        $notice = Http::get("https://tor-api.onrender.com/annonce/{$annonce}?annonce_id={$annonce}")->throw()->json();

        return view('admin.info', [
            'notice' => $notice
        ]);
    }

    public function update(Request $request, int $annonce)
    {
        dd($request);
        $validatedData = $request->validate([
            'libell_objet' => 'required|max:255',
            'description_objet' => 'required',
            'first_name_person_to_contact' => 'required|max:255',
            'last_name_person_to_contact' => 'required|max:255',
            'telephone_person_to_contact' => 'required|max:255',
            'place_of_loss_or_find' => 'required|max:255',
            'date_of_loss_or_find' => 'required|date'
        ]);
        Http::put("https://tor-api.onrender.com/annonce/{$annonce}?annonce_id=$annonce", $validatedData);

        return back()->with('success', 'Annonce mise à jour avec succès.');
    }

    public function publish(int $annonce)
    {
        Http::get("https://tor-api.onrender.com/annonce/publier/{$annonce}?annonce_id={$annonce}");
        return back();
    }

    public function done(int $annonce)
    {
        Http::get("https://tor-api.onrender.com/annonce/done/{$annonce}?annonce_id={$annonce}");
        return back();
    }
}
