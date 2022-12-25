<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\LeaderResource;
use App\Http\Resources\OrganizerResource;

class EventShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'venue' => $this->venue,
            'date' => $this->date,
            'image' =>url('/storage') . '/' . $this->image,
            'event_type' => $this->whenLoaded('eventType')->name,
            'leaders' => LeaderResource::collection($this->whenLoaded('leaders')),
            'organizers' =>  OrganizerResource::collection($this->whenLoaded('organizers'))
        ];
    }
}
