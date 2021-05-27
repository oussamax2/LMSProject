<?php

namespace App\DataTables;

use App\Models\states;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class statesDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'states.datatables_actions');
                  
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\states $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(states $model)
    {
        return $model->newQuery()->with('countries');
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
            ['data' => 'id', 'name' => 'id', 'title' =>'id', 'visible' => false],
            'name',
            'status',
            ['data' => 'countries.name', 'name' => 'countries.name', 'title' => __('forms.country Name')]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'states_datatable_' . time();
    }
}
