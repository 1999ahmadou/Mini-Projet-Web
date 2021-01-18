<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QuestionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $questionnaire = $this->whenLoaded('questionnaire');
        $props = $this->whenLoaded('propositions');

        return [
            'id'=>$this->id,
            'content'=>$this->content,
            'questionnaire'=>new QcmResource($this->whenLoaded($questionnaire)),
            'propositions'=> PropsResource::collection($this->whenLoaded($props)),
        ];
    }
}
