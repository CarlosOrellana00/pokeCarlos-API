<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;
use Spatie\SimpleExcel\SimpleExcelReader;
use Spatie\SimpleExcel\SimpleExcelWriter;

class PokemonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Pokemon::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function show(Pokemon $pokemon)
    {
        //
        return $pokemon;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function edit(Pokemon $pokemon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pokemon $pokemon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pokemon  $pokemon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokemon $pokemon)
    {
        //
    }

    public function cargarPokemon(){
        $pathToCsv = "pokedex_Update_04.21.csv";
        // $rows is an instance of Illuminate\Support\LazyCollection
        $rows = SimpleExcelReader::create($pathToCsv)->getRows();
        $rows->each(function(array $rowProperties) {
            // in the first pass $rowProperties will contain
            // ['email' => 'john@example.com', 'first_name' => 'john']
            $pokemon = new Pokemon();
            $pokemon->pokedex_number = $rowProperties["pokedex_number"];
            $pokemon->name = $rowProperties["name"];
            $pokemon->generation = $rowProperties["generation"];
            $pokemon->species = $rowProperties["species"];
            $pokemon->type_number = $rowProperties["type_number"];
            $pokemon->type_1 = $rowProperties["type_1"];
            $pokemon->type_2 = $rowProperties["type_2"];
            $pokemon->height_m = $rowProperties["height_m"];
            $pokemon->weight_kg = $rowProperties["weight_kg"];
            $pokemon->save();
         });
         return "O.K";
    }
}
