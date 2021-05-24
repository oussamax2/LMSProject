<?php

namespace App\DataTables;

use App\Models\registerations;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class registerationsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'registerations.datatables_actions');

       
                        
        
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\registerations $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(registerations $model)
    {
        return $model->newQuery()->with('user')->with(['sessions', 'sessions.courses']);
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
            ['data' => 'user.name', 'name' => 'user.name', 'title' => __('forms.User Name')],
            ['data' => 'sessions.courses.title', 'name' => 'sessions.courses.title', 'title' => __('forms.Course Title')],
            ['data' => 'sessions.start', 'name' => 'sessions.start', 'title' => __('forms.Session startDate')]
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'registerations_datatable_' . time();
    }
}
