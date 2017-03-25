<?php

namespace App\Application\Transformers;

use App\Models\TeamRequest;
use Illuminate\Support\Collection;
use League\Fractal\TransformerAbstract;

class TeamRequestTransformer extends TransformerAbstract
{
    /**
     * @param Collection $items
     *
     * @return array
     */
    public function transform(TeamRequest $teamRequest, Collection $items)
    {
        $response = [];
        foreach ($items as $item) {
            $response[] = [
                'user' => [
                    'name' => $item->user->name,
                ],
            ];
        }

        return $response;
    }
}
