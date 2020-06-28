<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class ImagesResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        switch ($this->is_del){
            case 0:
                $this->is_del = '正常';
                break;
            case 1:
                $this->is_del = '删除';
                break;
        }
        return [
            'id'=>$this->id,
            'name' => $this->name,
            'url' => $this->url,
            'path' => $this->path,
            'is_del' => $this->is_del,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at
        ];
    }
}
