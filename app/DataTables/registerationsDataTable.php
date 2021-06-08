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
        $user = auth()->user();
        if($user->hasRole('user'))
        return $dataTable->addColumn('action', 'registerationsuser.datatables_actions');
        else
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
       $user = auth()->user();
       if($user->hasRole('admin'))
       return $model->newQuery()->with('user')->with(['sessions', 'sessions.courses']);
    elseif($user->hasRole('company')){
           return $model->newQuery()->with('user')->with(['sessions', 'sessions.courses'])->whereHas('sessions.courses', function ($query) {
            $user = auth()->user();
            $query->where('company_id',$user->companies->id);

       });}else{
        return $model->touser()->newQuery()->with('user')->with(['sessions', 'sessions.courses']);
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
            ->addAction(['width' => '120px', 'printable' => false])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
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
        $user = auth()->user();
        if($user->hasRole('user')){
        return [
            'id'=> ['visible' => false, 'printable' => false, 'exportable' => true],
            ['data' => 'sessions.courses.title', 'name' => 'sessions.courses.title', 'title' => __('forms.Course Title')],
            ['data' => 'sessions.start', 'name' => 'sessions.start', 'title' => __('forms.Session startDate')]
        ];}
        else{
        return [
            'id'=> ['visible' => false, 'printable' => false, 'exportable' => true],
            ['data' => 'user.name', 'name' => 'user.name', 'title' => __('forms.User Name')],
            ['data' => 'sessions.courses.title', 'name' => 'sessions.courses.title', 'title' => __('forms.Course Title')],
            ['data' => 'sessions.start', 'name' => 'sessions.start', 'title' => __('forms.Session startDate')]
        ];}
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
