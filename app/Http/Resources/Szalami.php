<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Szalami extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "id" =>$this->id,
            "nev" =>$this->nev,
            "ara"=>$this->ara,
            "tipus"=>$this->tipus,
            "ido"=>$this->ido,
            "created_at"=>$this->created_at->format("m/d/Y"),
            "updated_at"=>$this->updated_at->format("m/d/Y"),
        ];
    }
}
