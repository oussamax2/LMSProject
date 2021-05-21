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

        return $dataTable->addColumn('action', 'registerations.datatables_actions')

                        ->editColumn('user_id', function ($dataTable) { 
                            return $dataTable->user['name'];
                            
                        })
                        ->addColumn('course_title', function ($dataTable) { 
                            return $dataTable->sessions->courses['title'];
                            
                        })        
                        ->editColumn('session_id', function ($dataTable) { 
                            return $dataTable->sessions['start'];
                            
                        })->escapeColumns([]);   

       
                        
        
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\registerations $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(registerations $model)
    {
        return $model->newQuery();
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
            ['data' => 'user_id', 'name' => 'user_id', 'title' => __('forms.User Name')],
            ['data' => 'course_title', 'name' => 'course_title', 'title' => __('forms.Course Title')],
            ['data' => 'session_id', 'name' => 'session_id', 'title' => __('forms.Session startDate')]
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
