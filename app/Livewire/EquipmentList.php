<?php

namespace App\Livewire;

use App\Models\Equipment;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Filament\Table\Actions\CreateAction;
use Filament\Tables\Columns\ViewColumn;

class EquipmentList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(Equipment::query())->headerActions([
                    \Filament\Tables\Actions\CreateAction::make()->icon('heroicon-m-plus')->label('New Equipment')
                        ->action(
                            function ($data) {
                                Equipment::create([
                                    'name' => $data['name'],
                                    'description' => $data['description'],
                                ]);
                            }
                        )
                        ->form([
                            TextInput::make('name')->required(),
                            Textarea::make('description')->required(),
                        ]
                        )
                ])
            ->columns([
                TextColumn::make('name')->label('NAME')->searchable(),
                TextColumn::make('description')->label('DESCRIPTION')->searchable(),

            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()->action(
                    function ($record, $data) {
                        $record->update([
                            'name' => $data['name'],
                            'description' => $data['description'],
                        ]);
                    }
                )
                    ->form([
                        TextInput::make('name')->required(),
                        Textarea::make('description')->required(),
                    ]),
                DeleteAction::make(),
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render()
    {
        return view('livewire.equipment-list');
    }
}
