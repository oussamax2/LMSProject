<?php

namespace App\DataTables;

use App\Models\companies;
use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class companiesDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'companies.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\companies $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(companies $model)
    {
        return $model->newQuery()->with('user');
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [

                ],
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            ['data' => 'user.name', 'name' => 'user.name', 'title' => __('firstname')],
            'lastname',
            'website',
            'telephone',
            'picture',
            'shortDescription',
            'description',
            'fcburl',
            'twitturl',
            'linkdinurl',
            'dribbleurl'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'companies_datatable_' . time();
    }
}
