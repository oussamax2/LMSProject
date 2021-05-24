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

        return $dataTable->addColumn('action', 'courses.datatables_actions')
                         ->editColumn('company_id', function ($dataTable) {
                             return $dataTable->companies->user['name'];

                         })
                         ->editColumn('category_id', function ($dataTable) {
                             return $dataTable->categories['name'];

                         })
                         ->addColumn('count_session', function ($dataTable) {
                             return count($dataTable->sessions);

                         })->escapeColumns([]);

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
            ['data' => 'company_id', 'name' => 'company_id', 'title' => __('forms.Company Name')],
            'title',
            ['data' => 'category_id', 'name' => 'category_id', 'title' => __('forms.Category Name')],
            'published_on',
            ['data' => 'count_session', 'name' => 'count_session', 'title' => __('forms.Session Number')],
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
