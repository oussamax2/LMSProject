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
                         ->editColumn('created_at', function ($dataTable) {
                            return  Carbon::parse($dataTable['created_at'])->isoFormat(' Do MMMM  YYYY ');

                        })
                        ->setRowAttr([
                            'style' => function($dataTable){
                                return $dataTable->deleted_at ? 'background-color: #ffc10721;' : '';
                            }
                        ])
                        ->escapeColumns([]);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\courses $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(courses $model)
    {if($_GET["archive"] ==1)
        $model = courses::onlyTrashed();

         $user = auth()->user();
         $start_date = (!empty($_GET["start_date"])) ? ($_GET["start_date"]) : ('');
        $end_date = (!empty($_GET["end_date"])) ? ($_GET["end_date"]) : ('');
        if($start_date && $end_date){

            $start_date = date($start_date);
            $end_date = date($end_date);

            if($user->hasRole('admin'))
            return $model->newQuery()->with('companies')->with('categories')->whereBetween('created_at', [$start_date,$end_date])->select('courses.*') ;
            else
            return $model->newQuery()->with('companies')->with('categories')->where('company_id',$user->companies->id);
        }



    if($user->hasRole('admin'))
        return $model->newQuery()->with('companies')->with('categories')->select('courses.*') ;
        else
        return $model->newQuery()->with('companies')->with('categories')->where('company_id',$user->companies->id);
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

            ->ajax(
                [
                    'url' => route('courses.index'),
                    'type' => 'GET',
                    'data' => 'function(d) {
                        d.archive = $("#archive").val();
                        d.reset = $("#reset").val();
                        }',
                ]
            )
             ->addAction(['width' => '120px', 'printable' => false,'title' => __('front.Action')])
            ->parameters([
                'dom'       => 'Bfrtip',

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
        $visisble = false;
        if(auth()->user()->hasRole('admin'))
        $visisble = true;
        return [
            ['data' => 'id', 'name' => 'id', 'title' =>'id', 'visible' => $visisble],
            ['data' => 'companies.lastname', 'name' => 'companies.lastname', 'title' => __('forms.Company Name') ,'visible' => $visisble],
            ['data' => 'title', 'name' => 'title', 'title' => __('forms.title')],
            ['data' => 'categories.name', 'name' => 'categories.name', 'title' => __('forms.Category Name')],
            ['data' => 'created_at', 'name' => 'created_at', 'title' => __('forms.Published On')],
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
