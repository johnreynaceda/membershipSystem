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

// use Filament\Tables\Columns\ViewColumn;

class Attendance extends Component implements HasForms
{

    use InteractsWithForms;
    use Actions;
    public $qr_code;
    public $get_qr;
    public $amount;
    public $plan;
    public $show_panel = false;

    public $scanned;
    public $qr_modal = false;
    public $member_id;



    #[On('qrScanned')]
    public function qrScanned($newScan){
    $this->qr_code = $newScan;
    $this->updatedQrCode();
    }


    public function scanNow(){
        $this->qr_modal = true;
    }




    public function updatedQrCode()
    {
        // dd($this->qr_code);
        $data = MemberList::where('identification_code', $this->qr_code)->first();


        if ($data != null) {
            $this->get_qr = $data;
            $this->member_id = $data->id;
            $this->show_panel = true;
        } else {
            sweetalert()->addError('Sorry, there was no member assigned to this qr code.');
            $this->qr_code = "";
            return redirect()->route('attendance');
        }
    }


    // public function table(Table $table): Table
    // {
    //     return $table
    //         ->query(AttendanceModel::query()->when($this->get_qr, function ($record) {
    //             return $record->where('member_list_id', $this->member_id);
    //         }))
    //         ->columns([
    //             TextColumn::make('memberList.firstname')->label('FIRSTNAME'),
    //             TextColumn::make('memberList.lastname')->label('LASTNAME'),
    //             TextColumn::make('time_in')->label('TIME IN')->date('h:i A'),
    //             TextColumn::make('time_out')->label('TIME OUT')->date('h:i A'),
    //             TextColumn::make('created_at')->date()->label('DATE'),
    //             ViewColumn::make('is_paid')->label('STATUS')->view('filament.tables.paid_status')
    //         ]);
    // }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('qr_code')->label('SCAN QR CODE')->autofocus()->live(),

            ]);

    }

    public function submit()
    {
        sleep(2);
        $member = MemberList::where('id', $this->get_qr->id)->first();
        $data = AttendanceModel::where('member_list_id', $this->get_qr->id)->whereDate('created_at', now())->first();


        if ($data == null) {
          if ($member->membership_plan != 'Daily') {
            AttendanceModel::create([
                        'member_list_id' => $this->get_qr->id,
                        'time_in' => now(),
                        'is_paid' => true,
                    ]);
                    Sale::create([
                        'member_name' => $this->get_qr->firstname . ' ' . $this->get_qr->lastname,
                        'total_amount' => $this->amount ?? 0,
                    ]);
                    sweetalert()->addSuccess('Member was successfully timed in.');
                    return redirect()->route('attendance');
          }else{

             if ($this->amount) {
                AttendanceModel::create([
                    'member_list_id' => $this->get_qr->id,
                    'time_in' => now(),
                    'is_paid' => true,
                ]);
                Sale::create([
                    'member_name' => $this->get_qr->firstname . ' ' . $this->get_qr->lastname,
                    'total_amount' => $this->amount,
                ]);
                sweetalert()->addSuccess('Member was successfully timed in.');
                return redirect()->route('attendance');
            } else {
                AttendanceModel::create([
                    'member_list_id' => $this->get_qr->id,
                    'time_in' => now(),
                ]);
                return redirect()->route('attendance');
            }
          }



        } else {
            if ($member->membership_plan != 'Daily') {
                $data->update([
                            'member_list_id' => $this->get_qr->id,
                            'time_out' => now(),
                            'is_paid' => true,
                        ]);
                        // Sale::create([
                        //     'member_name' => $this->get_qr->firstname . ' ' . $this->get_qr->lastname,
                        //     'total_amount' => $this->amount,
                        // ]);
                        sweetalert()->addSuccess('Member was successfully timed out.');
                        return redirect()->route('attendance');
            }else{
                if ($this->amount) {
                $data->update([
                    'member_list_id' => $this->get_qr->id,
                    'time_out' => now(),
                    'is_paid' => true,
                ]);
                Sale::create([
                    'member_name' => $this->get_qr->firstname . ' ' . $this->get_qr->lastname,
                    'total_amount' => $this->amount,
                ]);
                sweetalert()->addSuccess('Member was successfully timed out.');
                return redirect()->route('attendance');
            } else {
                $data->update([
                    'member_list_id' => $this->get_qr->id,
                    'time_out' => now(),
                ]);
                return redirect()->route('attendance');
            }
            }

        }
    }

    public function renewPlan($id)
    {
        sleep(3);
        $this->validate([
            'plan' => 'required',
        ]);

        $data = MemberList::where('id', $id)->first();

        $data->update([
            'membership_plan' => $this->plan,
            'is_expired' => false,
        ]);

    }

    public function render()
    {
        return view('livewire.attendance',[
            'attendances' => AttendanceModel::when($this->member_id, function($record){
                $record->where('member_list_id', $this->member_id);
            })->get(),
        ]);
    }
}
