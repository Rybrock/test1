<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\BelongsTo;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Select;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Http\Requests\NovaRequest;

class Game extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Game>
     */
    public static $model = \App\Models\Game::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'game_name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'game_name',
    ];

    /**
     * Get the fields displayed in the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Game Name', 'game_name')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Genre', 'genre')
                ->sortable()
                ->rules('required', 'max:255'),

            Select::make('Platforms')
                ->options([
                    'PS5' => 'PS5',
                    'XBOX' => 'XBOX',
                    'PC' => 'PC',
                ])
                ->rules('required'),

            Text::make('Game Origin', 'game_origin')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Meta Critic Score', 'meta_critic_score')
                ->sortable()
                ->rules('required', 'numeric', 'min:0', 'max:100'),

            Boolean::make('Out Now', 'out_now')
                ->sortable()
                ->rules('required'),

            Text::make('Audience', 'audience')
                ->sortable()
                ->rules('required', 'max:255'),

            Text::make('Online Stores', 'online_stores')
                ->sortable()
                ->rules('nullable', 'max:255'),

            Boolean::make('Collector\'s Edition', 'collectors_edition')
                ->sortable()
                ->rules('required'),

            Date::make('Release Date', 'release_date')
                ->sortable()
                ->rules('required', 'date'),

            // Relationship Fields
            BelongsToMany::make('Developer', 'developer', \App\Nova\Developer::class)
                ->sortable()
                ->rules('required', 'exists:developers,id'),

            BelongsToMany::make('Subscribers', 'subscribers', \App\Nova\Subscriber::class),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function cards(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function filters(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function lenses(NovaRequest $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function actions(NovaRequest $request)
    {
        return [];
    }
}
