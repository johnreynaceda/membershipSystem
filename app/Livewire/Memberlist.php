<?php

namespace App\Livewire;

use App\Models\Attendance;
use App\Models\MemberList as memberLists;
use Carbon\Carbon;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Select;
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

class Memberlist extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;

    public function table(Table $table): Table
    {
        return $table
            ->query(memberLists::query())->headerActions([
                    \Filament\Tables\Actions\CreateAction::make()->icon('heroicon-m-plus')->label('New Member')
                        ->action(
                            function ($data) {
                                MemberLists::create([
                                    'identification_code' => $this->generateRandomString(),
                                    'firstname' => $data['firstname'],
                                    'middlename' => $data['middlename'],
                                    'lastname' => $data['lastname'],
                                    'birthdate' => $data['birthdate'],
                                    'age' => Carbon::parse($data['birthdate'])->age,
                                    'gender' => $data['gender'],
                                    'address' => $data['address'],
                                    'contact_number' => $data['contact_number'],
                                    'membership_plan' => $data['membership_plan'],
                                    'member_type' => $data['type'],

                                ]);
                            }
                        )
                        ->form([
                            Grid::make(2)->schema(
                                [
                                    TextInput::make('firstname')
                                        ->required(),
                                    TextInput::make('middlename'),
                                    TextInput::make('lastname')
                                        ->required(),
                                    DatePicker::make('birthdate')->required(),
                                    Select::make('gender')->required()->options([
                                        'Male' => 'Male',
                                        'Female' => 'Female',
                                    ]),
                                    TextInput::make('address')
                                        ->required(),
                                    TextInput::make('contact_number')->numeric()
                                        ->required(),
                                    Select::make('membership_plan')->label('Membership Plan')->options([
                                        'Daily' => 'Daily',
                                        'Monthly' => 'Monthly',
                                        'Annual' => 'Annual',
                                    ]),
                                    Select::make('type')->label('Member Type')->options([
                                        'Student' => 'Student',
                                        'Outsider' => 'Outsider',
                                    ]),

                                ]
                            )
                        ])
                ])
            ->columns([
                ViewColumn::make('qr')->view('filament.tables.qr')->label('QR CODE'),
                TextColumn::make('firstname')->label('FULLNAME')->searchable(['firstname', 'lastname'])->formatStateUsing(
                    function ($record) {
                        return $record->firstname . ' ' . $record->lastname;
                    }
                ),
                TextColumn::make('birthdate')->date()->label('BIRTHDATE'),
                TextColumn::make('age')->label('AGE'),
                TextColumn::make('gender')->label('GENDER'),
                TextColumn::make('address')->label('ADDRESS'),
                TextColumn::make('contact_number')->label('CONTACT NUMBER'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                EditAction::make()->action(
                    function ($record, $data) {
                        $record->update([
                            'firstname' => $data['firstname'],
                            'middlename' => $data['middlename'],
                            'lastname' => $data['lastname'],
                            'birthdate' => $data['birthdate'],
                            'age' => Carbon::parse($data['birthdate'])->age,
                            'gender' => $data['gender'],
                            'address' => $data['address'],
                            'contact_number' => $data['contact_number'],
                            'membership_plan' => $data['membership_plan'],
                            'member_type' => $data['type'],
                        ]);
                    }
                )
                    ->form([
                        Grid::make(2)->schema(
                            [
                                TextInput::make('firstname')
                                    ->required(),
                                TextInput::make('middlename'),
                                TextInput::make('lastname')
                                    ->required(),
                                DatePicker::make('birthdate')->required(),
                                Select::make('gender')->required()->options([
                                    'Male' => 'Male',
                                    'Female' => 'Female',
                                ]),
                                TextInput::make('address')
                                    ->required(),
                                TextInput::make('contact_number')->numeric()
                                    ->required(),
                                Select::make('membership_plan')->label('Membership Plan')->options([
                                    'Daily' => 'Daily',
                                    'Monthly' => 'Monthly',
                                    'Annual' => 'Annual',
                                ]),
                                Select::make('type')->label('Member Type')->options([
                                    'Student' => 'Student',
                                    'Outsider' => 'Outsider',
                                ]),

                            ]
                        )
                    ]),
                DeleteAction::make()->action(
                    function ($record){
                        foreach (Attendance::where('member_list_id', $record->id)->get() as $key => $value) {
                            $value->delete();
                        }
                        $record->delete();
                    }
                ),
            ])
            ->bulkActions([
                // ...
            ]);
    }


    function generateRandomString($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';

        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, strlen($characters) - 1)];
        }

        return $randomString;
    }



    public function render()
    {
        return view('livewire.memberlist');
    }
}
