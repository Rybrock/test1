<?php

namespace App\Nova;

use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class GameEvent extends Resource
{
    public static $model = \App\Models\GameEvents::class;

    public static $title = 'name';

    public static $search = [
        'id',
        'name',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Location')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Platforms')
                ->sortable()
                ->rules('required', 'max:255'),

            Date::make('Event Date')
                ->sortable()
                ->rules('required'),

            BelongsToMany::make('Games', 'games', Game::class),

            BelongsToMany::make('Developers', 'developers', Developer::class),

            BelongsToMany::make('Subscribers', 'subscribers', Subscriber::class),
        ];
    }
}
