<?php

namespace App\Livewire;

use Livewire\Component;

class FindOurStore extends Component
{
    public $stores = [
        [
            'name' => 'Syihab Banjarbaru',
            'address' => 'Jl. A. Yani KM 35 No. 48, Loktabat Utara, Kec. Banjarbaru Utara, Kota Banjar Baru, Kalimantan Selatan 70713'
        ],
        [
            'name' => 'Syihab Premium Banjarbaru',
            'address' => 'Guntung Payung, Landasan Ulin, Banjarbaru City, South Kalimantan 70714'
        ],
        [
            'name' => 'Syihab Martapura',
            'address' => 'Jl. A. Yani No.38, Cindai Alus, Kec. Martapura, Kabupaten Banjar, Kalimantan Selatan'
        ],
        [
            'name' => 'Syihab Veteran',
            'address' => 'Jl. Veteran No.287, Sungai Bilu, Kec. Banjarmasin Tim., Kota Banjarmasin, Kalimantan Selatan 70236'
        ],
        [
            'name' => 'Syihab Sultan Adam',
            'address' => 'Jl. Sultan Adam, Sungai Miai, Kec. Banjarmasin Utara, Kota Banjarmasin, Kalimantan Selatan 70123'
        ]       
    ];

    public function render()
    {
        return view('livewire.find-our-store');
    }
}
