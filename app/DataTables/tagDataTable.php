<?php

namespace App\DataTables;

use App\Models\tag;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class tagDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'tags.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\tag $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(tag $model)
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
        return [
            ['data' => 'name', 'name' => 'name', 'title' => __('forms.name')],
            ['data' => 'category_id', 'name' => 'category_id', 'title' => __('forms.category_id')],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'tags_datatable_' . time();
    }
}
