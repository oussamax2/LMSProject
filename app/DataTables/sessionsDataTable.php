<?php

namespace App\DataTables;

use App\Models\sessions;
use Carbon\Carbon;
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

                        })
                        ->editColumn('start', function ($dataTable) {
                            return  Carbon::parse($dataTable['start'])->isoFormat(' Do MMMM  YYYY ');

                        })
                        ->editColumn('end', function ($dataTable) {
                            return  Carbon::parse($dataTable['end'])->isoFormat(' Do MMMM  YYYY ');

                        })
                        ->addColumn('count_registrations', function ($dataTable) {
                            return count($dataTable->registerations);

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
            $user = auth()->user();
            if($user->hasRole('admin'))
            return $model->newQuery()->whereHas('courses', function ($query) {
                $query->where('company_id',1);});
         else{
                 return $model->newQuery()->whereHas('courses', function ($query) {
                    $user = auth()->user();
                    $query->where('company_id',$user->companies->id);});

                 }
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
             ->addAction(['width' => '120px', 'printable' => false,'title' => __('front.Action')])
            ->parameters([
                'dom'       => 'Bfrtip',

                'order'     => [[0, 'desc']],
                'buttons'   => [
                ],'language' => ['url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/' . __("forms.lang") . '.json'],
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
            ['data' => 'course_id', 'name' => 'course_id', 'title' => __('forms.Course Title')],
            ['data' => 'count_registrations', 'name' => 'count_registrations', 'title' => __('forms.Registration Number')],
            ['data' => 'start', 'name' => 'start', 'title' => __('forms.start Date')],
            ['data' => 'end', 'name' => 'end', 'title' => __('forms.end Date')],
            ['data' => 'fee', 'name' => 'fee', 'title' => __('forms.fee')],


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
