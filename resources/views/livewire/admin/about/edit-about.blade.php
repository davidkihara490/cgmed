@section('page-title')
    {{ __('About Section') }}
@endsection

<div>
    <div class="row">
        <div class="col-xl-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title mb-4">Company Information Management</h4>

                    <div class="row">
                        <!-- Left Side - Tabs Navigation -->
                        <div class="col-sm-3">
                            <div class="nav flex-column nav-pills nav-pills-tab" id="v-pills-tab" role="tablist"
                                aria-orientation="vertical">
                                <button
                                    class="nav-link mb-1 text-start {{ $activeTab === 'history' ? 'active show' : '' }}"
                                    wire:click="setActiveTab('history')" type="button" role="tab">
                                    <i class="mdi mdi-history me-1"></i> Our History
                                </button>
                                <button
                                    class="nav-link mb-1 text-start {{ $activeTab === 'mission' ? 'active show' : '' }}"
                                    wire:click="setActiveTab('mission')" type="button" role="tab">
                                    <i class="mdi mdi-target me-1"></i> Mission & Vision
                                </button>
                                <button
                                    class="nav-link mb-1 text-start {{ $activeTab === 'team' ? 'active show' : '' }}"
                                    wire:click="setActiveTab('team')" type="button" role="tab">
                                    <i class="mdi mdi-account-group me-1"></i> Our Team
                                </button>
                                <button
                                    class="nav-link mb-1 text-start {{ $activeTab === 'values' ? 'active show' : '' }}"
                                    wire:click="setActiveTab('values')" type="button" role="tab">
                                    <i class="mdi mdi-heart me-1"></i> Our Values
                                </button>
                                <button
                                    class="nav-link mb-1 text-start {{ $activeTab === 'quality' ? 'active show' : '' }}"
                                    wire:click="setActiveTab('quality')" type="button" role="tab">
                                    <i class="mdi mdi-certificate me-1"></i> Quality Assurance
                                </button>
                                <button
                                    class="nav-link mb-1 text-start {{ $activeTab === 'innovation' ? 'active show' : '' }}"
                                    wire:click="setActiveTab('innovation')" type="button" role="tab">
                                    <i class="mdi mdi-lightbulb-on me-1"></i> Innovation
                                </button>
                                <button
                                    class="nav-link mb-1 text-start {{ $activeTab === 'partnerships' ? 'active show' : '' }}"
                                    wire:click="setActiveTab('partnerships')" type="button" role="tab">
                                    <i class="mdi mdi-handshake me-1"></i> Partnerships
                                </button>
                                <button
                                    class="nav-link mb-1 text-start {{ $activeTab === 'certifications' ? 'active show' : '' }}"
                                    wire:click="setActiveTab('certifications')" type="button" role="tab">
                                    <i class="mdi mdi-file-document me-1"></i> Certifications
                                </button>
                            </div>
                            <div class="mt-3">
                                <button type="button" class="btn btn-success w-100" wire:click="saveAll"
                                    wire:loading.attr="disabled">
                                    <i class="mdi mdi-content-save-all me-1"></i>
                                    <span wire:loading.remove>Save All Sections</span>
                                    <span wire:loading>Saving...</span>
                                </button>
                            </div>
                        </div>

                        <!-- Right Side - Tab Content -->
                        <div class="col-sm-9">
                            <div class="tab-content pt-0">
                                <!-- Our History Tab -->
                                @if ($activeTab === 'history')
                                    <div class="tab-pane fade show active" id="v-pills-history" role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5>Our History</h5>
                                            <button type="button" class="btn btn-primary"
                                                wire:click="saveSection('history')" wire:loading.attr="disabled">
                                                <i class="mdi mdi-content-save me-1"></i>
                                                <span wire:loading.remove>Save History</span>
                                                <span wire:loading>Saving...</span>
                                            </button>
                                        </div>
                                        <form wire:submit.prevent="saveSection('history')">
                                            <div class="mb-3">
                                                <label for="historyContent" class="form-label">Company History</label>
                                                <textarea class="form-control" id="historyContent" rows="10" wire:model="history.content"
                                                    placeholder="Enter detailed company history, founding story, milestones, and achievements..."></textarea>
                                                @error('history.content')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="milestones" class="form-label">Key Milestones</label>
                                                <textarea class="form-control" id="milestones" rows="4" wire:model="history.milestones"
                                                    placeholder="List important milestones and achievements..."></textarea>
                                                @error('history.milestones')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </form>
                                    </div>
                                @endif

                                <!-- Mission & Vision Tab -->
                                @if ($activeTab === 'mission')
                                    <div class="tab-pane fade show active" id="v-pills-mission" role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5>Mission & Vision</h5>
                                            <button type="button" class="btn btn-primary"
                                                wire:click="saveSection('mission')" wire:loading.attr="disabled">
                                                <i class="mdi mdi-content-save me-1"></i>
                                                <span wire:loading.remove>Save Mission & Vision</span>
                                                <span wire:loading>Saving...</span>
                                            </button>
                                        </div>
                                        <form wire:submit.prevent="saveSection('mission')">
                                            <div class="mb-3">
                                                <label for="missionContent" class="form-label">Our Mission</label>
                                                <textarea class="form-control" id="missionContent" rows="5" wire:model="mission.mission"
                                                    placeholder="Enter company mission statement..."></textarea>
                                                @error('mission.mission')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="visionContent" class="form-label">Our Vision</label>
                                                <textarea class="form-control" id="visionContent" rows="5" wire:model="mission.vision"
                                                    placeholder="Enter company vision for the future..."></textarea>
                                                @error('mission.vision')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label for="philosophyContent" class="form-label">Company
                                                    Philosophy</label>
                                                <textarea class="form-control" id="philosophyContent" rows="4" wire:model="mission.philosophy"
                                                    placeholder="Enter company philosophy and guiding principles..."></textarea>
                                                @error('mission.philosophy')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </form>
                                    </div>
                                @endif

                                <!-- Our Team Tab -->
                                @if ($activeTab === 'team')
                                    <div class="tab-pane fade show active" id="v-pills-team" role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5>Our Team</h5>
                                            <div>
                                                <button type="button" class="btn btn-success btn-sm me-2"
                                                    wire:click="addTeamMember">
                                                    <i class="mdi mdi-plus"></i> Add Member
                                                </button>
                                                <button type="button" class="btn btn-primary"
                                                    wire:click="saveSection('team')" wire:loading.attr="disabled">
                                                    <i class="mdi mdi-content-save me-1"></i>
                                                    <span wire:loading.remove>Save Team</span>
                                                    <span wire:loading>Saving...</span>
                                                </button>
                                            </div>
                                        </div>

                                        <form wire:submit.prevent="saveSection('team')">
                                            <div id="teamMembersContainer">
                                                @foreach ($team['team_members'] as $index => $member)
                                                    <div class="team-member-card card mb-3">
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Profile Image</label>
                                                                        <div
                                                                            class="border rounded p-3 text-center mb-2">
                                                                            <i
                                                                                class="mdi mdi-account-circle mdi-48px text-muted"></i>
                                                                            <div class="mt-2">
                                                                                <input type="file"
                                                                                    class="form-control"
                                                                                    wire:model="teamMemberImages.{{ $index }}"
                                                                                    accept="image/*">
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-text">Recommended: 300x300px
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label class="form-label">Full
                                                                                    Name</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    wire:model="team.team_members.{{ $index }}.name"
                                                                                    placeholder="Enter full name">
                                                                                @error("team.team_members.{$index}.name")
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="mb-3">
                                                                                <label
                                                                                    class="form-label">Position</label>
                                                                                <input type="text"
                                                                                    class="form-control"
                                                                                    wire:model="team.team_members.{{ $index }}.position"
                                                                                    placeholder="Enter position">
                                                                                @error("team.team_members.{$index}.position")
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Department</label>
                                                                        <select class="form-select"
                                                                            wire:model="team.team_members.{{ $index }}.department">
                                                                            <option value="management">Management
                                                                            </option>
                                                                            <option value="medical">Medical</option>
                                                                            <option value="sales">Sales</option>
                                                                            <option value="research">Research &
                                                                                Development</option>
                                                                            <option value="quality">Quality Assurance
                                                                            </option>
                                                                            <option value="operations">Operations
                                                                            </option>
                                                                        </select>
                                                                        @error("team.team_members.{$index}.department")
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label
                                                                            class="form-label">Description/Bio</label>
                                                                        <textarea class="form-control" rows="3" wire:model="team.team_members.{{ $index }}.description"
                                                                            placeholder="Short description about team member"></textarea>
                                                                        @error("team.team_members.{$index}.description")
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Email</label>
                                                                        <input type="email" class="form-control"
                                                                            wire:model="team.team_members.{{ $index }}.email"
                                                                            placeholder="email@company.com">
                                                                        @error("team.team_members.{$index}.email")
                                                                            <span
                                                                                class="text-danger">{{ $message }}</span>
                                                                        @enderror
                                                                    </div>
                                                                    @if ($index > 0)
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm"
                                                                            wire:click="removeTeamMember({{ $index }})">
                                                                            <i class="mdi mdi-delete"></i> Remove
                                                                            Member
                                                                        </button>
                                                                    @endif
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </form>
                                    </div>
                                @endif

                                <!-- Our Values Tab -->
                                @if ($activeTab === 'values')
                                    <div class="tab-pane fade show active" id="v-pills-values" role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5>Our Values</h5>
                                            <button type="button" class="btn btn-primary"
                                                wire:click="saveSection('values')" wire:loading.attr="disabled">
                                                <i class="mdi mdi-content-save me-1"></i>
                                                <span wire:loading.remove>Save Values</span>
                                                <span wire:loading>Saving...</span>
                                            </button>
                                        </div>
                                        <form wire:submit.prevent="saveSection('values')">
                                            <div class="mb-3">
                                                <label for="valuesContent" class="form-label">Core Values
                                                    Statement</label>
                                                <textarea class="form-control" id="valuesContent" rows="6" wire:model="values.content"
                                                    placeholder="Describe company core values and culture..."></textarea>
                                                @error('values.content')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Core Values</label>
                                                @foreach ($values['values'] as $index => $value)
                                                    <div class="input-group mb-2">
                                                        <input type="text" class="form-control"
                                                            wire:model="values.values.{{ $index }}"
                                                            placeholder="Enter a core value">
                                                        @if ($index > 0)
                                                            <button class="btn btn-outline-danger" type="button"
                                                                wire:click="removeValue({{ $index }})">
                                                                <i class="mdi mdi-delete"></i>
                                                            </button>
                                                        @else
                                                            <button class="btn btn-outline-primary" type="button"
                                                                wire:click="addValue">
                                                                <i class="mdi mdi-plus"></i> Add
                                                            </button>
                                                        @endif
                                                    </div>
                                                    @error("values.values.{$index}")
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                @endforeach
                                            </div>
                                            <div class="mb-3">
                                                <label for="cultureContent" class="form-label">Company Culture</label>
                                                <textarea class="form-control" id="cultureContent" rows="4" wire:model="values.culture"
                                                    placeholder="Describe company culture and work environment..."></textarea>
                                                @error('values.culture')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </form>
                                    </div>
                                @endif

                                <!-- Quality Assurance Tab -->
                                @if ($activeTab === 'quality')
                                    <div class="tab-pane fade show active" id="v-pills-quality" role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5>Quality Assurance</h5>
                                            <button type="button" class="btn btn-primary"
                                                wire:click="saveSection('quality')" wire:loading.attr="disabled">
                                                <i class="mdi mdi-content-save me-1"></i>
                                                <span wire:loading.remove>Save Quality</span>
                                                <span wire:loading>Saving...</span>
                                            </button>
                                        </div>
                                        <form wire:submit.prevent="saveSection('quality')">
                                            <div class="mb-3">
                                                <label for="qualityContent" class="form-label">Quality Assurance
                                                    Processes</label>
                                                <textarea class="form-control" id="qualityContent" rows="6" wire:model="quality.content"
                                                    placeholder="Describe quality assurance processes and standards..."></textarea>
                                                @error('quality.content')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Quality Standards</label>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="iso9001" wire:model="quality.standards"
                                                                value="ISO 9001">
                                                            <label class="form-check-label" for="iso9001">ISO 9001
                                                                Certified</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="iso13485" wire:model="quality.standards"
                                                                value="ISO 13485">
                                                            <label class="form-check-label" for="iso13485">ISO 13485
                                                                (Medical Devices)</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="fdaApproved" wire:model="quality.standards"
                                                                value="FDA Approved">
                                                            <label class="form-check-label" for="fdaApproved">FDA
                                                                Approved</label>
                                                        </div>
                                                        <div class="form-check mb-2">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="gmp" wire:model="quality.standards"
                                                                value="GMP">
                                                            <label class="form-check-label" for="gmp">Good
                                                                Manufacturing Practices (GMP)</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Quality Metrics</label>
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text">Defect Rate</span>
                                                            <input type="number" class="form-control"
                                                                wire:model="quality.metrics.defect_rate"
                                                                placeholder="0.0" step="0.1">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                        @error('quality.metrics.defect_rate')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                        <div class="input-group mb-2">
                                                            <span class="input-group-text">Customer Satisfaction</span>
                                                            <input type="number" class="form-control"
                                                                wire:model="quality.metrics.customer_satisfaction"
                                                                placeholder="0.0" step="0.1">
                                                            <span class="input-group-text">%</span>
                                                        </div>
                                                        @error('quality.metrics.customer_satisfaction')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endif

                                <!-- Innovation Tab -->
                                @if ($activeTab === 'innovation')
                                    <div class="tab-pane fade show active" id="v-pills-innovation" role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5>Innovation & Research</h5>
                                            <button type="button" class="btn btn-primary"
                                                wire:click="saveSection('innovation')" wire:loading.attr="disabled">
                                                <i class="mdi mdi-content-save me-1"></i>
                                                <span wire:loading.remove>Save Innovation</span>
                                                <span wire:loading>Saving...</span>
                                            </button>
                                        </div>
                                        <form wire:submit.prevent="saveSection('innovation')">
                                            <div class="mb-3">
                                                <label for="innovationContent" class="form-label">Innovation
                                                    Strategy</label>
                                                <textarea class="form-control" id="innovationContent" rows="5" wire:model="innovation.content"
                                                    placeholder="Describe innovation initiatives and R&D strategy..."></textarea>
                                                @error('innovation.content')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">R&D Focus Areas</label>
                                                        <select class="form-select" multiple size="6"
                                                            wire:model="innovation.focus_areas">
                                                            <option value="medical-devices">Medical Devices</option>
                                                            <option value="pharmaceuticals">Pharmaceuticals</option>
                                                            <option value="diagnostic-tools">Diagnostic Tools</option>
                                                            <option value="telemedicine">Telemedicine Solutions
                                                            </option>
                                                            <option value="ai-healthcare">AI in Healthcare</option>
                                                            <option value="biotechnology">Biotechnology</option>
                                                            <option value="digital-health">Digital Health</option>
                                                            <option value="surgical-innovation">Surgical Innovation
                                                            </option>
                                                        </select>
                                                        <div class="form-text">Hold Ctrl to select multiple options
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">R&D Investment</label>
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">$</span>
                                                            <input type="number" class="form-control"
                                                                wire:model="innovation.rd_investment"
                                                                placeholder="Enter amount">
                                                            <span class="input-group-text">.00</span>
                                                        </div>
                                                        @error('innovation.rd_investment')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Patents Held</label>
                                                        <input type="number" class="form-control"
                                                            wire:model="innovation.patents_count"
                                                            placeholder="Number of patents">
                                                        @error('innovation.patents_count')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label">Research Partnerships</label>
                                                        <input type="number" class="form-control"
                                                            wire:model="innovation.research_partnerships"
                                                            placeholder="Number of research partners">
                                                        @error('innovation.research_partnerships')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endif

                                <!-- Partnerships Tab -->
                                @if ($activeTab === 'partnerships')
                                    <div class="tab-pane fade show active" id="v-pills-partnerships" role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5>Partnerships & Collaborations</h5>
                                            <div>
                                                <button type="button" class="btn btn-success btn-sm me-2"
                                                    wire:click="addPartner">
                                                    <i class="mdi mdi-plus"></i> Add Partner
                                                </button>
                                                <button type="button" class="btn btn-primary"
                                                    wire:click="saveSection('partnerships')"
                                                    wire:loading.attr="disabled">
                                                    <i class="mdi mdi-content-save me-1"></i>
                                                    <span wire:loading.remove>Save Partnerships</span>
                                                    <span wire:loading>Saving...</span>
                                                </button>
                                            </div>
                                        </div>
                                        <form wire:submit.prevent="saveSection('partnerships')">
                                            <div class="mb-3">
                                                <label for="partnershipsContent" class="form-label">Partnerships
                                                    Overview</label>
                                                <textarea class="form-control" id="partnershipsContent" rows="4" wire:model="partnerships.content"
                                                    placeholder="Describe key partnerships and collaborations..."></textarea>
                                                @error('partnerships.content')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Partners</label>
                                                @foreach ($partnerships['partners'] as $index => $partner)
                                                    <div class="card mb-3">
                                                        <div class="card-body">
                                                            <div class="row g-2">
                                                                <div class="col-md-5">
                                                                    <label class="form-label">Partner Name</label>
                                                                    <input type="text" class="form-control"
                                                                        wire:model="partnerships.partners.{{ $index }}.name"
                                                                        placeholder="Partner Name">
                                                                    @error("partnerships.partners.{$index}.name")
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="form-label">Type</label>
                                                                    <select class="form-select"
                                                                        wire:model="partnerships.partners.{{ $index }}.type">
                                                                        <option value="">Select Type</option>
                                                                        <option value="hospital">Hospital</option>
                                                                        <option value="supplier">Supplier</option>
                                                                        <option value="research">Research Institution
                                                                        </option>
                                                                        <option value="distribution">Distribution
                                                                            Partner</option>
                                                                        <option value="technology">Technology Partner
                                                                        </option>
                                                                    </select>
                                                                    @error("partnerships.partners.{$index}.type")
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="form-label">&nbsp;</label>
                                                                    @if ($index > 0)
                                                                        <button type="button"
                                                                            class="btn btn-danger w-100"
                                                                            wire:click="removePartner({{ $index }})">
                                                                            <i class="mdi mdi-delete"></i> Remove
                                                                        </button>
                                                                    @endif
                                                                </div>
                                                                <div class="col-12">
                                                                    <label class="form-label">Description</label>
                                                                    <textarea class="form-control" rows="2" wire:model="partnerships.partners.{{ $index }}.description"
                                                                        placeholder="Partner description"></textarea>
                                                                    @error("partnerships.partners.{$index}.description")
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </form>
                                    </div>
                                @endif

                                <!-- Certifications Tab -->
                                @if ($activeTab === 'certifications')
                                    <div class="tab-pane fade show active" id="v-pills-certifications"
                                        role="tabpanel">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <h5>Certifications & Accreditations</h5>
                                            <div>
                                                <button type="button" class="btn btn-success btn-sm me-2"
                                                    wire:click="addCertification">
                                                    <i class="mdi mdi-plus"></i> Add Certification
                                                </button>
                                                <button type="button" class="btn btn-primary"
                                                    wire:click="saveSection('certifications')"
                                                    wire:loading.attr="disabled">
                                                    <i class="mdi mdi-content-save me-1"></i>
                                                    <span wire:loading.remove>Save Certifications</span>
                                                    <span wire:loading>Saving...</span>
                                                </button>
                                            </div>
                                        </div>
                                        <form wire:submit.prevent="saveSection('certifications')">
                                            <div class="mb-3">
                                                <label class="form-label">Certifications</label>
                                                @foreach ($certifications['certifications'] as $index => $certification)
                                                    <div class="certification-item card mb-3">
                                                        <div class="card-body">
                                                            <div class="row g-3">
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Certification
                                                                        Name</label>
                                                                    <input type="text" class="form-control"
                                                                        wire:model="certifications.certifications.{{ $index }}.name"
                                                                        placeholder="e.g., ISO 9001:2015">
                                                                    @error("certifications.certifications.{$index}.name")
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="form-label">Issuing Authority</label>
                                                                    <input type="text" class="form-control"
                                                                        wire:model="certifications.certifications.{{ $index }}.authority"
                                                                        placeholder="e.g., International Organization for Standardization">
                                                                    @error("certifications.certifications.{$index}.authority")
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="form-label">Issue Date</label>
                                                                    <input type="date" class="form-control"
                                                                        wire:model="certifications.certifications.{{ $index }}.issue_date">
                                                                    @error("certifications.certifications.{$index}.issue_date")
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="form-label">Expiry Date</label>
                                                                    <input type="date" class="form-control"
                                                                        wire:model="certifications.certifications.{{ $index }}.expiry_date">
                                                                    @error("certifications.certifications.{$index}.expiry_date")
                                                                        <span
                                                                            class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label class="form-label">Certification
                                                                        File</label>
                                                                    <input type="file" class="form-control"
                                                                        wire:model="certificationFiles.{{ $index }}"
                                                                        accept=".pdf,.jpg,.png">
                                                                </div>
                                                                @if ($index > 0)
                                                                    <div class="col-12 text-end">
                                                                        <button type="button"
                                                                            class="btn btn-danger btn-sm"
                                                                            wire:click="removeCertification({{ $index }})">
                                                                            <i class="mdi mdi-delete"></i> Remove
                                                                            Certification
                                                                        </button>
                                                                    </div>
                                                                @endif
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Industry Standards Compliance</label>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="hipaa" wire:model="certifications.compliance"
                                                                value="HIPAA">
                                                            <label class="form-check-label" for="hipaa">HIPAA
                                                                Compliant</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="ce" wire:model="certifications.compliance"
                                                                value="CE">
                                                            <label class="form-check-label" for="ce">CE
                                                                Marking</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="who" wire:model="certifications.compliance"
                                                                value="WHO">
                                                            <label class="form-check-label" for="who">WHO
                                                                Standards</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="rohs" wire:model="certifications.compliance"
                                                                value="RoHS">
                                                            <label class="form-check-label" for="rohs">RoHS
                                                                Compliant</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="reach" wire:model="certifications.compliance"
                                                                value="REACH">
                                                            <label class="form-check-label" for="reach">REACH
                                                                Compliant</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                id="other" wire:model="certifications.compliance"
                                                                value="Other">
                                                            <label class="form-check-label" for="other">Other
                                                                Standards</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Success/Error Messages -->
    <script>
        document.addEventListener('livewire:initialized', () => {
            @this.on('section-saved', (message) => {
                toastr.success(message);
            });

            @this.on('all-saved', (message) => {
                toastr.success(message);
            });

            @this.on('section-error', (message) => {
                toastr.error(message);
            });
        });
    </script>
</div>
