<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Email;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Http\Requests\NovaRequest;

class Developer extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var class-string<\App\Models\Developer>
     */
    public static $model = \App\Models\Developer::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'developer_name'; // Use 'developer_name' to represent the developer

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'developer_name',
        'email',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Laravel\Nova\Http\Requests\NovaRequest  $request
     * @return array
     */
    public function fields(NovaRequest $request)
    {
        return [
            ID::make()->sortable(),

            Text::make('Developer Name', 'developer_name')
                ->sortable()
                ->rules('required', 'max:255'),

            Email::make('Email')
                ->sortable()
                ->rules('required', 'email', 'max:254'),

            Text::make('Developer Address', 'developer_address')
                ->sortable()
                ->rules('nullable', 'max:255'),

            Text::make('Developer Location', 'developer_location')
                ->sortable()
                ->rules('nullable', 'max:255'),

            Text::make('Lead Developer', 'lead_developer')
                ->sortable()
                ->rules('nullable', 'max:255'),

            Text::make('Genre')
                ->sortable()
                ->rules('required', 'max:255'),

            Boolean::make('Is Active', 'is_active')
                ->sortable()
                ->rules('required'),

            Date::make('First Published Game', 'first_published_game')
                ->sortable()
                ->rules('nullable', 'date'),

            Date::make('Last Published Game', 'last_published_game')
                ->sortable()
                ->rules('nullable', 'date'),
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