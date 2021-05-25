<?php

namespace App\DataTables;

use App\Models\courses;
use Carbon\Carbon;
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
                        ->addColumn('count_session', function ($dataTable) {
                             return count($dataTable->sessions);

                         })
                         ->editColumn('published_on', function ($dataTable) { 
                            return  Carbon::parse($dataTable['published_on'])->isoFormat(' Do MMMM  YYYY ');
                            
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
        return $model->newQuery()->with('companies')->with('categories')->select('courses.*') ;
        else
        return $model->newQuery()->where('company_id',$user->companies->id)->with('companies')->with('categories');
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

                ], 'language' => ['url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/' . __("forms.lang") . '.json'],
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
            ['data' => 'companies.lastname', 'name' => 'companies.lastname', 'title' => __('forms.Company Name')],
            'title',
            ['data' => 'categories.name', 'name' => 'categories.name', 'title' => __('forms.Category Name')],
            ['data' => 'published_on', 'name' => 'published_on', 'title' => __('forms.Published On:')],
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
