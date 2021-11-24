<?php

namespace App\DataTables;

use App\Models\cities;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class citiesDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'cities.datatables_actions')
                ->editColumn('picture', function($data) {
                    if(isset($data->picture) && $data->picture != NULL){
                    $url= asset("storage/".$data->picture);
                    return '<img class="profile-user-img  img-circle" src="'.$url.'" style="width: 70px; height:70px;" />';
                    }else{
                    $url= asset("images/defaultcity.png");
                    return '<img class="profile-user-img  img-circle" src="'.$url.'" style="width: 90px; height:90px;">';
                    }
                })
                ->editColumn('state_id', function ($dataTable) {
                    return $dataTable->states['name'];

                })->escapeColumns([]);

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\cities $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(cities $model)
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
            ['data' => 'id', 'name' => 'id', 'title' =>'id'],
            ['data' => 'picture', 'name' => 'picture', 'title' => __('forms.picture')],
            ['data' => 'name', 'name' => 'name', 'title' => __('forms.name')],
            ['data' => 'state_id', 'name' => 'state_id', 'title' => __('forms.State Name')],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'cities_datatable_' . time();
    }
}
