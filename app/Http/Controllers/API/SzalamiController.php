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
            "nev" =>"required",
            "ara"=>"required",
            "tipus"=>"required",
            "ido"=>"required",
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors("Validálási hiba", $validator->errors()));
        }
        $data->nev = $input["nev"];
        $data->ara = $input["ara"];
        $data->tipus = $input["tipus"];
        $data->ido = $input["ido"];
        $data->save();
        return $this->sendResponse(new SzalamiResource($data),"Poszt módosítva");
    }
    public function store(Request $request){
        //dd($request);
        $input = $request->all();
        $validator = Validator::make($input,[
            "nev" =>"required",
            "ara"=>"required",
            "tipus"=>"required",
            "ido"=>"required",
        ]);
        if($validator->fails()){
            return $this->sendError($validator->errors("Validálási hiba", $validator->errors()));
        }
        $data = Szalami::create($input);
        return $this->sendResponse(new SzalamiResource($data), "Sikeres hozzáadás");
    }
    public function search($name){
        $Szalami = Szalami::where('nev', 'like', '%'.$name.'%')->get();
        if(count($Szalami)==0){
            return $this->sendError("Nincs találat a keresésre");
        }
        return $this->sendResponse($Szalami, "Keresési találatok betöltve");
    }
    public function filter($tipus){
        $Szalami = Szalami::where('tipus', '=', $tipus)->get();
        if(count($Szalami)==0){
            return $this->sendError("Nincs találat a szűrésre");
        }
        return $this->sendResponse($Szalami, "Szűrési találatok betöltve");
    }
}
