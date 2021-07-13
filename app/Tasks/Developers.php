<?php

namespace App\Tasks;

use App\DataObjects\Dev;

class Developers
{
    public function all()
    {
        return collect([
            new Dev('Dev5', 5),
            new Dev('Dev4', 4),
            new Dev('Dev3', 3),
            new Dev('Dev2', 2),
            new Dev('Dev1', 1),
        ]);
    }
}
