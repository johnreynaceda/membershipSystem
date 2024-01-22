<?php

namespace App\Livewire;

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
use Livewire\Attributes\On;
use Filament\Tables\Filters\Filter;
use Illuminate\Database\Eloquent\Builder;

class AttendanceList extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    use Actions;

    public function table(Table $table): Table
    {
        return $table
            ->query(AttendanceModel::query())
            ->columns([
                TextColumn::make('memberList.firstname')->label('FIRSTNAME'),
                TextColumn::make('memberList.lastname')->label('LASTNAME'),
                TextColumn::make('time_in')->label('TIME IN')->date('h:i A'),
                TextColumn::make('time_out')->label('TIME OUT')->date('h:i A'),
                TextColumn::make('created_at')->date()->label('DATE'),
            ])->filters([
                Filter::make('created_at')
    ->form([
        DatePicker::make('created_from'),
        DatePicker::make('created_until'),
    ])
    ->query(function (Builder $query, array $data): Builder {
        return $query
            ->when(
                $data['created_from'],
                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
            )
            ->when(
                $data['created_until'],
                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
            );
    })
            ]);
    }
    public function render()
    {
        return view('livewire.attendance-list');
    }
}
