<?php
namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return[
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'password' => $this->password,
            'perfil_id' => $this->perfil_id
              ];
        }

        public function infoUserAgendamento()
        {
            return [
                'id' => $this->id,
                'name' => $this->name,
            ];
        }
}
