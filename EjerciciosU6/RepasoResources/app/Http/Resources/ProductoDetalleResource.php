<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductoDetalleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "nombre" => $this->nombre,
            "descripcion" => $this->descripcion,
            "precio" => $this->precio,
            "stock" => $this->stock,
            "activo" => $this->activo,
            "categoria_id" => $this->categoria_id,
            "categoria" => new CategoriaResource($this->whenLoaded('categoria')),
        ];
    }
}
