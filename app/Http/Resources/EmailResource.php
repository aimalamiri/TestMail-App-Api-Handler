<?php

namespace App\Http\Resources;

use App\Models\Email;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Email */
class EmailResource extends JsonResource
{
    public function toArray(Request $request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'from' => $this->from,
            'to' => $this->to,
            'subject' => $this->subject,
            'text' => $this->text,
            'html' => $this->html,
            'date' => $this->date,
            'headers' => $this->headers,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
