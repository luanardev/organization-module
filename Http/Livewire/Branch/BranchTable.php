<?php

namespace Lumis\Organization\Http\Livewire\Branch;

use Illuminate\Database\Eloquent\Builder;
use Lumis\Organization\Entities\Branch;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class BranchTable extends DataTableComponent
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
            return route('branch.show', $row);
        });

        $this->setBulkActions([
            'viewAction' => 'View',
            'editAction' => 'Edit',
            'deleteAction' => 'Delete',
        ]);
    }

    public function viewAction()
    {
        if ($this->getSelectedCount() > 0) {
            $key = collect($this->getSelected())->first();
            $this->redirectRoute('branch.show', $key);
        }
    }

    public function editAction()
    {
        if ($this->getSelectedCount() > 0) {
            $key = collect($this->getSelected())->first();
            $this->redirectRoute('branch.edit', $key);
        }
    }

    public function deleteAction()
    {
        if ($this->getSelectedCount() > 0) {
            Branch::destroy($this->getSelected());
            $this->redirectRoute('branch.index');
        }

    }

    public function columns(): array
    {
        return [
            Column::make('Name'),
            Column::make('ID', 'id')
        ];
    }

    public function builder(): Builder
    {
        return Branch::query()
            ->when($this->getSearch(),
                fn(Builder $query, $term) => $query->search($term)
            );
    }


}
