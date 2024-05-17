<?php

namespace App\Http\Controllers;

use App\Models\Ingatlan;
use Illuminate\Http\Request;

class IngatlanController extends Controller
{
    public function show($kateg_id)
    {
        $ingatlanok = Ingatlan::with('kategoria')->where('kateg_id', $kateg_id)->get();
        $result = $ingatlanok->map(function ($ingatlan) {
            return [
                'id' => $ingatlan->id,
                'kategoria_nev' => $ingatlan->kategoria->nev,
                'leiras' => $ingatlan->leiras,
                'datum' => $ingatlan->datum,
                'tehermentes' => $ingatlan->tehermentes,
                'ar' => $ingatlan->ar,
                'kep' => $ingatlan->kep

            ];
        });
        return $result;
    }


    public function store(Request $request)
    {
        $ingatlan = new  Ingatlan();
        $ingatlan->kateg_id = $request->kateg_id;
        $ingatlan->leiras = $request->leiras;
        $ingatlan->tehermentes = $request->tehermentes;
        $ingatlan->ar = $request->ar;
        $ingatlan->kep = $request->kep;
        
        $ingatlan->save();
    }

    public function destroy($id)
    {
        $ingatlan = Ingatlan::find($id);
        $ingatlan->delete();
    }
}
