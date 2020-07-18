<?php

namespace App\Exports;

use App\Campaign;
use App\Register;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;

class RegistersExport implements FromQuery
{
    protected $campaign_id;
    protected $unit;

    public function __construct($campaign_id, $unit)
    {
        $this->$campaign_id = $campaign_id;
        $this->unit = $unit;
    }

    public function query()
    {
        $campaign = Campaign::find($this->campaign);
        $campaign->setRelation('register', $campaign->register()->select('name', 'telephone', 'email')->where('unit_id', $this->unit));
        return $campaign->register;
    }
}
