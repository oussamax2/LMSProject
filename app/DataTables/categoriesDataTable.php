<?php

namespace App\DataTables;

use App\Models\categories;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class categoriesDataTable extends DataTable
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

        return $dataTable->addColumn(__('front.Action'), 'categories.datatables_actions')

                         ->editColumn('picture', function($data) {
                             if(isset($data->picture) && $data->picture != NULL){
                                $url= asset("storage/".$data->picture);
                                return '<img class="profile-user-img  img-circle" src="'.$url.'" style="width: 70px; height:70px;" />';
                             }else{
                                $url= asset("images/defaultpicture.png");
                                return '<img class="profile-user-img  img-circle" src="'.$url.'" style="width: 70px; height:70px;">';
                             }
                         })->escapeColumns([]);
            //   OR METHOD 2 by addColumn
            //     ->addColumn('picture', function ($dataTable) {
            //       $url= asset("storage/".$dataTable['picture']);
            //       return '<img src="'.$url.'" border="0" width="40" class="img-rounded" align="center" />';
            //      })->escapeColumns([]);


    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\categories $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(categories $model)
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
            ->addAction(['width' => '120px', 'printable' => false])
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
            ['data' => 'picture', 'name' => 'picture', 'title' => __('forms.picture')],
            ['data' => 'name', 'name' => 'name', 'title' => __('forms.name')],


        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'categories_datatable_' . time();
    }
}
