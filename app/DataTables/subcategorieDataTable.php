<?php

namespace App\DataTables;

use App\Models\subcategorie;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class subcategorieDataTable extends DataTable
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

        return $dataTable->addColumn('action', 'subcategories.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\subcategorie $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(subcategorie $model)
    {
        return $model->newQuery()->with('categories');
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
            ['data' => 'category_id', 'name' => 'category_id', 'title' => __('CATEGORY ID'), 'visible' => false] ,

            ['data' => 'categories.name', 'name' => 'categories.name', 'title' => __('forms.name')],
            ['data' => 'categories.name', 'name' => 'categories.name', 'title' => __('forms.category Name')],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'subcategories_datatable_' . time();
    }
}
