<?php

namespace App\Imports;

use App\Campaign;
use App\CampaignRegister;
use App\Register;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\Importable;

class RegistersImport implements ToCollection, WithValidation, WithHeadingRow
{
    use Importable;

    protected $campaign_id;
    protected $unit_id;

    public function __construct($campaign_id, $unit_id)
    {
        $this->campaign_id = $campaign_id;
        $this->unit_id = $unit_id;
    }

    public function collection(Collection $rows)
    {
        $register = new Register;
        $campaign = Campaign::find($this->campaign_id);
        set_time_limit(300);
        foreach ($rows as $row){
            if($row['email'] !== null){
                $register = Register::updateOrCreate([
                    'name' => $row['nome'],
                    'email' => $row['email'],
                    'telephone' => $row['telefone'],
                    'unit_id' => $this->unit_id,
                    'city' => $row['cidade'],
                    'courses' => $row['curso'],
                    'slot' => rand(1, 5),
                ])->campaign()->attach($this->campaign_id);
            }
        }
    }

    public function rules(): array
    {
        return [
            '*.email' => ['email', 'unique:registers,email']
        ];
    }
}
