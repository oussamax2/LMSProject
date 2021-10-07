<?php

namespace App\DataTables;

use App\Models\registerations;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Carbon\Carbon;

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
        return $dataTable->addColumn('action', 'registerationsuser.datatables_actions')
        ->editColumn('sessions.start', function($data) {

            return Carbon::parse($data->sessions->start)->isoFormat(' Do MMMM  YYYY ');

        })
        ->editColumn('status', function ($registerations) {
            if($registerations->status ==0)
            return '<span class="btn btn-ghost-info icon icon-hourglass"></span>NEW';
            if($registerations->status ==1)
            return '<span class="btn btn-ghost-danger icon icon-dislike"></span>REJECTED';
            if($registerations->status ==2)
            return '<span class="btn btn-ghost-pending icon icon-hourglass"></span>PENDING-PAYMENT';
            if($registerations->status ==3)
            return '<span class="btn btn btn-ghost-success icon icon-like"></span>CONFIRMED';
            if($registerations->status ==4)
            return '<span class="btn btn-ghost-danger icon icon-close"></span>CANCLED';})
            ->setRowAttr([
                'style' => function($registerations){
                    return $registerations->notif ? 'background-color: #00ff0021;' : '';
                }
            ])
            ->escapeColumns([]);
        else
        return $dataTable->addColumn('action', 'registerations.datatables_actions') ->editColumn('sessions.start', function($data) {

            return Carbon::parse($data->sessions->start)->isoFormat(' Do MMMM  YYYY ');
        })
        ->editColumn('status', function ($registerations) {
            if($registerations->status ==0)
            return '<span class="btn btn-ghost-info icon icon-hourglass"></span>NEW';
            if($registerations->status ==1)
            return '<span class="btn btn-ghost-danger icon icon-dislike"></span>REJECTED';
            if($registerations->status ==2)
            return '<span class="btn btn-ghost-pending icon icon-hourglass"></span>PENDING-PAYMENT';
            if($registerations->status ==3)
            return '<span class="btn btn btn-ghost-success icon icon-like"></span>CONFIRMED';
            if($registerations->status ==4)
            return '<span class="btn btn-ghost-danger icon icon-close"></span>CANCLED';})

            ->setRowAttr([
                'style' => function($registerations){
                    return $registerations->notifcompany ? 'background-color: #00ff0021;' : '';
                }
            ])

            ->escapeColumns([]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\registerations $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(registerations $model)
    { //$model = registerations::withTrashed();
    //$model = registerations::onlyTrashed();
       $user = auth()->user();
       if($user->hasRole('admin'))
       return $model->newQuery()->with('user')->with(['sessions', 'sessions.courses']);
    elseif($user->hasRole('company')){
           return $model->newQuery()->with('user')->with(['sessions', 'sessions.courses'])->whereHas('sessions.courses', function ($query) {
            $user = auth()->user();
            $query->where('company_id',$user->companies->id);

       });}
       else{
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
            ->addAction(['width' => '120px', 'printable' => false,'title' => __('front.Action')])
            ->parameters([
                'dom'       => 'Bfrtip',

                'order'     => [[5, 'desc']],
                'buttons'   => [
                ],'language' => ['url' => '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/' . __("forms.lang") . '.json'],
            ]);
    }

    /**
     * Get columns.->orderBy('updated_at', 'desc')
     *
     * @return array
     */
    protected function getColumns()
    {
        $user = auth()->user();
        if($user->hasRole('user')){
        return [
            'id'=> ['visible' => false, 'printable' => false, 'exportable' => true,'sortable'=> false],
            ['data' => 'sessions.courses.title', 'name' => 'sessions.courses.title', 'title' => __('forms.Course Title')],
            ['data' => 'sessions.start', 'name' => 'sessions.start', 'title' => __('forms.Session startDate')],
            ['data' => 'status', 'name' => 'status', 'title' => __('forms.status')],
            'updated_at'=> ['visible' => false, 'printable' => false, 'exportable' => true,'sortable'=> false],
        ];}
        else{
        return [
            'id'=> ['visible' => false, 'printable' => false, 'exportable' => true],
            ['data' => 'user.name', 'name' => 'user.name', 'title' => __('forms.User Name') ,'sortable'=> false],
            ['data' => 'sessions.courses.title', 'name' => 'sessions.courses.title', 'title' => __('forms.Course Title')],
            ['data' => 'sessions.start', 'name' => 'sessions.start', 'title' => __('forms.Session startDate')],
            ['data' => 'status', 'name' => 'status', 'title' => __('forms.status')],
            'updated_at'=> ['visible' => false, 'printable' => false, 'exportable' => true,'sortable'=> false],
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
