<?php

namespace Lumis\Organization\Http\Livewire\Department;

use Illuminate\Database\Eloquent\Builder;
use Lumis\Organization\Entities\Department;
use Lumis\Organization\Entities\Faculty;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Filter;

class DepartmentTable extends DataTableComponent
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
            return route('department.show', $row);
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
            $this->redirectRoute('department.show', $key);
        }
    }

    public function editAction()
    {
        if ($this->getSelectedCount() > 0) {
            $key = collect($this->getSelected())->first();
            $this->redirectRoute('department.edit', $key);
        }
    }

    public function deleteAction()
    {
        if ($this->getSelectedCount() > 0) {
            Faculty::destroy($this->getSelected());
            $this->redirectRoute('department.index');
        }

    }

    public function columns(): array
    {
        return [
            Column::make('Code', 'code'),
            Column::make('Name', 'name'),
            Column::make('Faculty', 'faculty.name'),
            Column::make('ID', 'id')
        ];
    }

    public function builder(): Builder
    {
        return Department::query()
            ->when($this->getSearch(),
                fn(Builder $query, $term) => $query->search($term)
            );
    }

}
