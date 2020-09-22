<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        if ($this->image != Null) {
            $image = asset('assets/img/' . $this->image->name);
        } else {
            $image = Null;
        }
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'image' => $image,
        ];
//        'user_id'=> UserResource::find($this->user_id),
    }
}
