<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

use App\Models\Employee;

use App\Models\User;

use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [          
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,           
        ];
    }
}