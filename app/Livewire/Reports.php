<?php

namespace App\Livewire;

use App\Models\Equipment;
use App\Models\Member;
use App\Models\MemberList;
use App\Models\Sale;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
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
use WireUi\Traits\Actions;
use App\Models\Attendance as AttendanceModel;

class Reports extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    public $selected;
    public $date_from;
    public $date_to;

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)->schema([
                    Select::make('selected')->label('Report')->live()->options([
                        'Equipments' => 'Equipments',
                        'Income' => 'Income',
                        'Attendance' => 'Attendance'
                    ]),
                    DatePicker::make('date_from')->live()->visible(
                        function ($record) {
                            return $this->selected === 'Income';
                        }
                    ),
                    DatePicker::make('date_to')->live()->visible(
                        function ($record) {
                            return $this->selected === 'Income';
                        }
                    ),
                ]),

            ]);

    }

    public function table(Table $table): Table
    {
        return $table
            ->query(AttendanceModel::query());

    }


    public function render()
    {
        return view('livewire.reports', [
            'equipments' => Equipment::all(),
            'sales' => Sale::when($this->date_from, function ($record) {
                return $record->whereBetween('created_at', [$this->date_from, $this->date_to]);
            })->get(),
            'attendances' => AttendanceModel::all(),
        ]);
    }
}
