<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ReadingListBookResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'comments' => $this->comments,
            'author' =>  $this->author,
            'priority' => $this->priority,
            'created_at' => (string) $this->created_at,
            'updated_at' => (string) $this->updated_at,
            'user' => $this->user,
        ];
    }
}
