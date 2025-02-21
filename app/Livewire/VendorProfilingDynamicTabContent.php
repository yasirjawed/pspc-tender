<?php

namespace App\Livewire;

use Livewire\Component;

class VendorProfilingDynamicTabContent extends Component
{
    public $activeTab = 'businessProfile';
    public $tabs = [
        'businessProfile' => 'Business Profile',
        'registrationBodies' => 'Registration Bodies',
        'supportingdocuments' => 'Supporting Documents',
    ];
    public function setActiveTab($tab){
        $this->activeTab = $tab;
    }
    public function render(){
        return view('livewire.vendor-profiling-dynamic-tab-content');
    }

}
