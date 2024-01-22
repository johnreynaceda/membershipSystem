<?php

namespace App\Livewire;

use App\Models\Sale;
use Livewire\Component;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Filament\Table\Actions\CreateAction;
use Filament\Tables\Columns\ViewColumn;

class Payment extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    public function render()
    {
        return view('livewire.payment',[
            'total_income' => Sale::sum('total_amount'),
        ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Sale::query())
            ->columns([
                TextColumn::make('member_name')->label('FULLNAME')->searchable(),

                TextColumn::make('total_amount')->label('AMOUNT')->formatStateUsing(
                    function ($record) {
                        return 'PHP ' . number_format($record->total_amount, 2);
                    }
                ),
                TextColumn::make('created_at')->label('DATE')->date()->searchable(),
            ])
            ->filters([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

}
