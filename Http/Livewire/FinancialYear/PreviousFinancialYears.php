<?php

namespace Lumis\Organization\Http\Livewire\FinancialYear;

use Illuminate\Database\Eloquent\Builder;
use Lumis\Organization\Entities\FinancialYear;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PreviousFinancialYears extends DataTableComponent
{

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPageName('page');
        $this->setPerPageAccepted([10, 25, 50, 100]);
        $this->setSearchEnabled();
        $this->setPaginationEnabled();
        $this->setBulkActionsDisabled();
        $this->setColumnSelectDisabled();

    }

    public function viewAction()
    {
        if ($this->getSelectedCount() > 0) {
            $key = collect($this->getSelected())->first();
            $this->redirectRoute('branch.show', $key);
        }
    }

    public function columns(): array
    {
        return [
            Column::make('Name', 'name'),
            Column::make('Status', 'status'),
            Column::make('ID', 'id')
        ];
    }

    public function builder(): Builder
    {
        return FinancialYear::query()->where('status', 'Inactive')
            ->when($this->getSearch(),
                fn(Builder $query, $term) => $query->where('name', $term)
            );
    }


}
