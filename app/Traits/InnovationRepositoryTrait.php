<?php

namespace App\Traits;

use App\Models\Innovations;

trait InnovationRepositoryTrait
{
    public function getInnovations()
    {
        return Innovations::query()
                    -> whereNotNull('top_order')
                    -> orderBy('top_order', 'asc')
                    -> get();
    }

    public function listInnovations(int $paginate, array $data = [])
    {
        if (count($data) > 0) {
            $inovasi = Innovations::query()
                -> get($data)
                -> paginate($paginate);
        } else {
            $inovasi = Innovations::query()->paginate($paginate);
        }

        return $inovasi;
    }

    public function countInnovations()
    {
        return Innovations::query()
                -> count();
    }
}
