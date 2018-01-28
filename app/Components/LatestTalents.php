<?php

namespace App\Components;

class LatestTalents extends AbstractComponent implements ComponentsInterface
{
    public static function render()
    {
        $latest_talents = [];

        return view(
            self::VIEW.'.latest-talents',
            compact(
                'latest_talents'
            )
        );
    }
}