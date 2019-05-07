<?php

namespace App\Http\Resources;

use App\Http\Resources\MatchResource;
use Illuminate\Http\Resources\Json\JsonResource;

class MatchResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'slug' => $this->slug,
             'number_of_matches' => $this->number_of_matches,
             'match_status' => $this->match_status,
             'scheduled_date' => $this->scheduled_date,
             'team_a' => $this->teama,
             'team_b' => $this->teamb,
             'winner' => $this->winner,
             'category' => $this->category,
             'event' => $this->event,
             'children' => MatchResource::collection($this->whenLoaded('children'))

        ];
    }
}
