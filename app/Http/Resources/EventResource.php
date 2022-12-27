<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

use App\Http\Resources\LeaderResource;
use App\Http\Resources\OrganizerResource;

class EventResource extends JsonResource
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
            'id' => $this->id,
            'name' => $this->name,
            'venue' => $this->venue,
            'date' => $this->date,
            'content' => $this->content,
            'image' => url('/storage') . '/' . $this->image,
            'event_type' => $this->whenLoaded('eventType')->name,
            'leaders' => $this->leaders()->exists() ? LeaderResource::collection($this->whenLoaded('leaders')) : null,
            'organizers' => $this->organizers()->exists() ? OrganizerResource::collection($this->whenLoaded('organizers')) : null,
        ];
    }
}
