<?php

namespace App\DataTables;

use App\Models\User;
use App\Traits\ApiResponseDashboard;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class UsersDataTable extends BaseDatatable
{
    use ApiResponseDashboard;

    protected ?string $actionable = 'index|edit|delete';



    /**
     * Get the query source of dataTable.
     */
    public function query(): Builder
    {
        return User::query()->latest();
    }

    /**
     * Optional method if you want to use the html builder.
     */
    protected function getCustomColumns(): array
    {
        return [
            'name' => function ($model) {
                $title = $model?->name;
                return view('components.datatable.includes.columns.title', compact('title'));
            },
            'email' => function ($model) {
                $title = $model?->email;
                return view('components.datatable.includes.columns.title', compact('title'));
            },


        ];
    }

    protected function getColumns(): array
    {
        return [
            Column::computed('name')->title(__('name'))->className('text-center'),
            Column::computed('email')->title(__('email'))->className('text-center'),
        ];
    }

}
