<?php

namespace App\Http\Resources\Admin;

use App\Models\Images;
use Illuminate\Http\Resources\Json\JsonResource;

class BrandResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'logo_id' => $this->logo,
            'logo' => Images::find($this->logo)->url ?? '',
            'sort' => $this->sort,
            'is_del' => $this->is_del,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at
        ];
    }
}
