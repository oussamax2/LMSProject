<?php

namespace App\DataTables;

use App\Models\companies;
use App\Models\User;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Carbon\Carbon;
use Cache;
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
                ->editColumn('picture', function($data) {
                    if(isset($data->picture) && $data->picture != NULL){
                    $url= asset("storage/".$data->picture);
                    return '<img class="profile-user-img  img-circle" src="'.$url.'" style="width: 70px; height:70px;" />';
                    }else{
                    $url= asset("images/defaultuser.png");
                    return '<img class="profile-user-img  img-circle" src="'.$url.'" style="width: 70px; height:70px;">';
                    }
                })
                ->editColumn('user.last_seen', function ($data) {
                    if (Cache::has('user-is-online-' . $data->user->id))
                    return ' <span class="badge badge-success">'.__("forms.is online. Last seen:") . Carbon::parse($data->user->last_seen)->diffForHumans().'</span>' ;
                else
                    return ' <span class="badge badge-danger">'. __("forms.is offline. Last seen:"). Carbon::parse($data->user->last_seen)->diffForHumans() .'</span>';


                })
                ->editColumn('status', function ($companies) {
                    if($companies->status ==0)
                    return '<span class="btn btn-ghost-info icon icon-hourglass"></span>';
                    if($companies->status ==1)
                    return '<span class="btn btn-ghost-danger icon icon-dislike"></span>';
                    if($companies->status ==2)
                    return '<span class="btn btn btn-ghost-success icon icon-like"></span>';})
                ->escapeColumns([]);
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
             ->addAction(['width' => '120px', 'printable' => false,'title' => __('front.Action')])
            ->parameters([
                'dom'       => 'Bfrtip',

                'order'     => [[7, 'desc']],
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
            ['data' => 'picture', 'name' => 'picture', 'title' => __('forms.picture')],
            ['data' => 'user.name', 'name' => 'user.name', 'title' => __('forms.firstname')],
            ['data' => 'lastname', 'name' => 'lastname', 'title' => __('forms.lastname')],
            ['data' => 'user.email', 'name' => 'user.email', 'title' => __('forms.email')],
            ['data' => 'telephone', 'name' => 'telephone', 'title' => __('forms.telephone')],
            ['data' => 'status', 'name' => 'status', 'title' => __('forms.status')],
            ['data' => 'user.last_seen', 'name' => 'user.last_seen', 'title' => ''],


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
