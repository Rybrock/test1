<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;
use Laravel\Nova\Http\Requests\NovaRequest;

class Game extends Resource
{
    public static $model = \App\Models\Game::class;

    public static $title = 'title';

    public static $search = [
        'id',
        'title',
    ];

    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Title')
                ->sortable()
                ->rules('required', 'max:255'),

            Date::make('Release Date')
                ->sortable()
                ->rules('nullable', 'date'),

            Text::make('Developer Team')
                ->sortable()
                ->rules('nullable', 'max:255'),

            Number::make('Rating')
                ->sortable()
                ->rules('nullable', 'numeric'),

            Number::make('Times Listed')
                ->sortable()
                ->rules('nullable', 'integer'),

            Number::make('Number of Reviews')
                ->sortable()
                ->rules('nullable', 'integer'),

            Textarea::make('Genres')
                ->sortable()
                ->rules('nullable'),

            Textarea::make('Summary')
                ->sortable()
                ->rules('nullable'),

            Textarea::make('Reviews')
                ->sortable()
                ->rules('nullable'),

            BelongsTo::make('Developer')->nullable()->sortable(),

            BelongsToMany::make('Game Events', 'gameEvents', GameEvent::class),

        ];
    }
}
