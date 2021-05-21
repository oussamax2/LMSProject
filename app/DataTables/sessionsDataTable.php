<?php

namespace App\DataTables;

use App\Models\sessions;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class sessionsDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'sessions.datatables_actions')
                        ->editColumn('course_id', function ($dataTable) { 
                            return $dataTable->courses['title'];
                            
                        })
                        ->editColumn('country_id', function ($dataTable) { 
                            return $dataTable->countries['name'];
                            
                        })
                        ->editColumn('state', function ($dataTable) { 
                            return $dataTable->states['name'];
                            
                        })   
                        ->editColumn('city', function ($dataTable) { 
                            return $dataTable->cities['name'];
                            
                        })->escapeColumns([]);
                        
                        

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\sessions $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(sessions $model)
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
            'start',
            'end',
            'fee',
            'language',           
            ['data' => 'course_id', 'name' => 'course Name', 'title' => __('forms.Course Name')],
            ['data' => 'country_id', 'name' => 'country Name', 'title' => __('forms.Country Name')],
            ['data' => 'state', 'name' => 'course Name', 'title' => __('forms.State Name')],
            ['data' => 'city', 'name' => 'country Name', 'title' => __('forms.City Name')],   
            'note'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'sessions_datatable_' . time();
    }
}
