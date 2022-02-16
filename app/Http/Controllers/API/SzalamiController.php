<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use Validator;
use App\Models\Szalami;
use App\Http\Resources\Szalami as SzalamiResource;

class SzalamiController extends BaseController
{
    public function index(){
        $data = Szalami::all();
        return $this->sendResponse(SzalamiResource::Collection($data),"Adatok betöltve");
    }
    public function show($id){
        $data = Szalami::find($id);
        if(is_null($data)){
            return $this->sendError("", "Nincs adat!");
        }
        return $this->sendResponse(new SzalamiResource($data),"Adat betöltve");
    }
    public function destroy( $data){
        Szalami::destroy($data);
        return $this->sendResponse("","Törlés sikeres!");
    }
    public function update(Request $request, Szalami $data){
        $input = $request->all();
        $validator = Validator::make($input,[
            "név" =>"required",
            "ár"=>"required",
            "típus"=>"required",
            "lejárati_idő"=>"required",
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors("Validálási hiba", $validator->errors()));
        }
        $data->nev = $input["név"];
        $data->ara = $input["ár"];
        $data->tipus = $input["típus"];
        $data->ido = $input["lejárati_idő"];
        $data->save();
        return $this->sendResponse(new SzalamiResource($data),"termék módosítva");
    }
    public function store(Request $request){
        //dd($request);
        $input = $request->all();
        $validator = Validator::make($input,[
            "név" =>"required",
            "ár"=>"required",
            "típus"=>"required",
            "lejárati_idő"=>"required",
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors("Validálási hiba", $validator->errors()));
        }
        $data = Szalami::create($input);
        return $this->sendResponse(new SzalamiResource($data), "Sikeres hozzáadás");
    }
    public function search($name){
        $szalami = Szalami::where('név', 'like', '%'.$name.'%')->get();
        if(count($szalami)==0){
            return $this->sendError("Nincs találat a keresésre");
        }
        return $this->sendResponse($szalami, "Keresési találatok betöltve");
    }
    public function filter($tipus){
        $szalami = Szalami::where('típus', '=', $tipus)->get();
        if(count($szalami)==0){
            return $this->sendError("Nincs találat a szűrésre");
        }
        return $this->sendResponse($szalami, "Szűrési találatok betöltve");
    }
}
