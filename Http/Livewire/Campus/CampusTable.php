<?php

namespace Lumis\Organization\Http\Livewire\Campus;

use Illuminate\Database\Eloquent\Builder;
use Lumis\Organization\Entities\Campus;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CampusTable extends DataTableComponent
{

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPageName('page');
        $this->setPerPageAccepted([10, 25, 50, 100]);
        $this->setSearchEnabled();
        $this->setPaginationEnabled();
        $this->setBulkActionsEnabled();
        $this->setColumnSelectDisabled();

        $this->setTableRowUrl(function($row) {
            return route('campus.show', $row);
        });

        $this->setBulkActions([
            'viewAction' => 'View',
            'editAction' => 'Edit',
            'deleteAction' => 'Delete'
        ]);
    }

    public function viewAction()
    {
        if ($this->getSelectedCount() > 0) {
            $key = collect($this->getSelected())->first();
            $this->redirectRoute('campus.show', $key);
        }
    }

    public function editAction()
    {
        if ($this->getSelectedCount() > 0) {
            $key = collect($this->getSelected())->first();
            $this->redirectRoute('campus.edit', $key);
        }
    }

    public function deleteAction()
    {
        if ($this->getSelectedCount() > 0) {
            Campus::destroy($this->getSelected());
            $this->redirectRoute('campus.index');
        }

    }

    public function columns(): array
    {
        return [

            Column::make('Code', 'code'),
            Column::make('Name', 'name'),
            Column::make('Branch', 'branch.name'),
            Column::make('ID', 'id')
        ];
    }

    public function builder(): Builder
    {
        return Campus::query()
            ->when($this->getSearch(),
                fn(Builder $query, $term) => $query->search($term)
            )
            ->when($this->getAppliedFilterWithValue('branch'),
                fn(Builder $query, $term) => $query->where('branch_id', $term)
            );
    }



}
