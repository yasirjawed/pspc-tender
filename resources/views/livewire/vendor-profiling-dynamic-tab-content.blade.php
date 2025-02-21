<div class="container-fluid p-5">
    <div class="card p-3" style="box-shadow: rgba(99, 99, 99, 0.2) 0px 2px 8px 0px;">
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    @foreach ($tabs as $tabKey => $tabName)
                        <a href="javascript:void(0);" class="list-group-item list-group-item-action {{ $activeTab == $tabKey ? 'active' : '' }}" wire:click="setActiveTab('{{ $tabKey }}')">
                            {{ $tabName }}
                            <span class="check-icon"></span>
                        </a>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9">
                <div class="accordion" id="accordionExample">
                    <div class="custom-loader-wrap" wire:loading>
                        <div class="loader">
                            <div class="spinner">
                                <img src="{{ asset('frontend/assets/img/pspc-logo.png') }}" alt="Logo" class="loader-logo-profile">
                            </div>
                        </div>
                    </div>
                    @if ($activeTab == 'businessProfile')
                        @livewire('vendor-profiling-business-profile')
                    @elseif ($activeTab == 'registrationBodies')
                        @livewire('vendor-profiling-registeration-bodies')
                    @elseif ($activeTab == 'supportingdocuments')
                        @livewire('vendor-profiling-supporting-documents')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
