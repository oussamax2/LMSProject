<?php

namespace App\DataTables;

use App\Models\courses;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class coursesDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'courses.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\courses $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(courses $model)
    {
         $user = auth()->user();
    if($user->hasRole('admin'))
        return $model->newQuery()->with('companies');
        else
        return $model->newQuery()->where('company_id',$user->companies->id)->with('companies');
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
            'company_id',
            ['data' => 'companies.user_id', 'name' => 'companies.user_id', 'title' => __('forms.Title')],
            'title',
            'body',
            'published_on',
            'category_id',
            'tags'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'courses_datatable_' . time();
    }
}
