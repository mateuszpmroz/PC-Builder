<?php

namespace App\Repository;

use App\Component;

class PcBuilderRepository
{
    public static function getComponentByTypeAndPoints(int $points, int $type)
    {
        return Component::where('type', $type)->where('points', '>=', $points)
            ->orderBy('points', 'asc')->get();
    }
}