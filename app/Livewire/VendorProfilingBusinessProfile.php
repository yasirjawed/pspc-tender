<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BusinessCategory;
use App\Models\BusinessIndustry;
use App\Models\Country;
use App\Models\City;

class VendorProfilingBusinessProfile extends Component
{
    public $business_categories;
    public $business_industries;
    public $originClassification = 'local';
    public $countries;
    public $selectedCountry;
    public $cities = [];
    public function mount(){
        $this->business_categories = BusinessCategory::orderBy('sorting','ASC')->active()->get();
        $this->business_industries = BusinessIndustry::orderBy('sorting','ASC')->active()->get();
        $this->countries = $this->originClassification == "local" ? Country::where('origin','local')->get() : Country::where('origin','international')->get();
    }
    public function updatedoriginClassification($value){
        if($this->originClassification=='local'){
            $this->countries = Country::where('origin','local')->get();
        }
        if($this->originClassification=='international'){
            $this->countries = Country::where('origin','international')->get();
        }
        $this->selectedCountry = [];
        $this->cities = [];
        $this->dispatch("reinitilize-select2-inputs");
        $this->dispatch("reset-country-select2");
    }
    public function updatedselectedCountry($value){
        $this->cities = City::where('country_id',$value)->get();
        $this->dispatch("reinitilize-select2-inputs");
    }
    public function render(){
        return view('livewire.vendor-profiling-business-profile');
    }
}
