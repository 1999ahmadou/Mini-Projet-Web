<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class QcmResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return
        [
            'id'=>'Questionnaire [ '.$this->id.' ]',
            'title'=>'titre [ '.$this->title.' ]',
            'questions'=>$this->questions,
        ];
    }
}
