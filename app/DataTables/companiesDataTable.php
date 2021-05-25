<?php

namespace App\DataTables;

use App\Models\companies;
use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class companiesDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'companies.datatables_actions')
         ->editColumn('picture', '<img class="profile-user-img  img-circle" src="{{ asset("storage/".$picture) }}" style="width: 70px;">')
         ->editColumn('status', function ($companies) {
             if($companies->status ==0)
            return '<span class="btn btn-ghost-info icon icon-hourglass"></span>';
            if($companies->status ==1)
            return '<span class="btn btn-ghost-danger icon icon-dislike"></span>';
            if($companies->status ==2)
            return '<span class="btn btn btn-ghost-success icon icon-like"></span>';})
         ->escapeColumns([]);;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\companies $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(companies $model)
    {
        return $model->newQuery()->with('user');
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
            'picture',
            ['data' => 'user.name', 'name' => 'user.name', 'title' => __('firstname')],
            'lastname',
            ['data' => 'user.email', 'name' => 'user.email', 'title' => __('email')],
            'telephone',
            'status',


        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'companies_datatable_' . time();
    }
}
