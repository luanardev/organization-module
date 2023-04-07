<?php

namespace Lumis\Organization\Http\Livewire\Section;

use Illuminate\Database\Eloquent\Builder;
use Lumis\Organization\Entities\Section;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SectionTable extends DataTableComponent
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
            return route('section.show', $row);
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
            $this->redirectRoute('section.show', $key);
        }
    }

    public function editAction()
    {
        if ($this->getSelectedCount() > 0) {
            $key = collect($this->getSelected())->first();
            $this->redirectRoute('section.edit', $key);
        }
    }

    public function deleteAction()
    {
        if ($this->getSelectedCount() > 0) {
            Section::destroy($this->getSelected());
            $this->redirectRoute('section.index');
        }

    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name'),
            Column::make('ID', 'id')
        ];
    }

    public function builder(): Builder
    {
        return Section::query()
            ->when($this->getSearch(),
                fn(Builder $query, $term) => $query->search($term)
            );
    }


}
