<?php

namespace App\Livewire\Admin\About;

use Livewire\Component;
use App\Models\AboutSection;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class EditAbout extends Component
{
    use WithFileUploads;

    // Form data arrays
    public $history = [];
    public $mission = [];
    public $team = [];
    public $values = [];
    public $quality = [];
    public $innovation = [];
    public $partnerships = [];
    public $certifications = [];
    // Temporary uploads
    public $teamMemberImages = [];
    public $certificationFiles = [];

    // Active tab
    public $activeTab = 'history';

    protected $rules = [
        'history.content' => 'nullable|string',
        'history.milestones' => 'nullable|string',

        'mission.mission' => 'nullable|string',
        'mission.vision' => 'nullable|string',
        'mission.philosophy' => 'nullable|string',

        'team.team_members.*.name' => 'required|string|max:255',
        'team.team_members.*.position' => 'required|string|max:255',
        'team.team_members.*.department' => 'required|string|max:255',
        'team.team_members.*.description' => 'nullable|string',
        'team.team_members.*.email' => 'nullable|email',
        'teamMemberImages.*' => 'nullable|image|max:2048',

        'values.content' => 'nullable|string',
        'values.culture' => 'nullable|string',
        'values.values.*' => 'nullable|string|max:255',

        'quality.content' => 'nullable|string',
        'quality.standards' => 'nullable|array',
        'quality.metrics.defect_rate' => 'nullable|numeric|min:0|max:100',
        'quality.metrics.customer_satisfaction' => 'nullable|numeric|min:0|max:100',

        'innovation.content' => 'nullable|string',
        'innovation.focus_areas' => 'nullable|array',
        'innovation.rd_investment' => 'nullable|numeric|min:0',
        'innovation.patents_count' => 'nullable|integer|min:0',
        'innovation.research_partnerships' => 'nullable|integer|min:0',

        'partnerships.content' => 'nullable|string',
        'partnerships.partners.*.name' => 'nullable|string|max:255',
        'partnerships.partners.*.type' => 'nullable|string|max:255',
        'partnerships.partners.*.description' => 'nullable|string',

        'certifications.certifications.*.name' => 'nullable|string|max:255',
        'certifications.certifications.*.authority' => 'nullable|string|max:255',
        'certifications.certifications.*.issue_date' => 'nullable|date',
        'certifications.certifications.*.expiry_date' => 'nullable|date',
        'certificationFiles.*' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
        'certifications.compliance' => 'nullable|array',
    ];

    public function mount()
    {
        $this->loadSections();
    }

    public function loadSections()
    {
        // Load or initialize all sections
        $this->loadSection('history');
        $this->loadSection('mission');
        $this->loadSection('team');
        $this->loadSection('values');
        $this->loadSection('quality');
        $this->loadSection('innovation');
        $this->loadSection('partnerships');
        $this->loadSection('certifications');
    }

    private function loadSection($type)
    {
        $section = AboutSection::type($type)->first();

        switch ($type) {
            case 'history':
                $this->history = [
                    'content' => $section->content ?? '',
                    'milestones' => $section->data['milestones'] ?? ''
                ];
                break;

            case 'mission':
                $data = $section->data ?? [];
                $this->mission = [
                    'mission' => $data['mission'] ?? '',
                    'vision' => $data['vision'] ?? '',
                    'philosophy' => $data['philosophy'] ?? ''
                ];
                break;

            case 'team':
                $this->team = [
                    'team_members' => $section->team_members ?: [
                        ['name' => '', 'position' => '', 'department' => 'management', 'description' => '', 'email' => '']
                    ]
                ];
                break;

            case 'values':
                $this->values = [
                    'content' => $section->content ?? '',
                    'culture' => $section->data['culture'] ?? '',
                    'values' => $section->values_list ?: ['']
                ];
                break;

            case 'quality':
                $data = $section->data ?? [];
                $this->quality = [
                    'content' => $section->content ?? '',
                    'standards' => $section->quality_standards ?: [],
                    'metrics' => [
                        'defect_rate' => $data['metrics']['defect_rate'] ?? 0,
                        'customer_satisfaction' => $data['metrics']['customer_satisfaction'] ?? 0
                    ]
                ];
                break;

            case 'innovation':
                $data = $section->data ?? [];
                $this->innovation = [
                    'content' => $section->content ?? '',
                    'focus_areas' => $section->innovation_focus_areas ?: [],
                    'rd_investment' => $data['rd_investment'] ?? 0,
                    'patents_count' => $data['patents_count'] ?? 0,
                    'research_partnerships' => $data['research_partnerships'] ?? 0
                ];
                break;

            case 'partnerships':
                $this->partnerships = [
                    'content' => $section->content ?? '',
                    'partners' => $section->partnerships ?: [
                        ['name' => '', 'type' => '', 'description' => '']
                    ]
                ];
                break;

            case 'certifications':
                $data = $section->data ?? [];
                $this->certifications = [
                    'certifications' => $section->certifications ?: [
                        ['name' => '', 'authority' => '', 'issue_date' => '', 'expiry_date' => '']
                    ],
                    'compliance' => $data['compliance'] ?? []
                ];
                break;
        }
    }

    public function addTeamMember()
    {
        $this->team['team_members'][] = [
            'name' => '',
            'position' => '',
            'department' => 'management',
            'description' => '',
            'email' => ''
        ];
    }

    public function removeTeamMember($index)
    {
        if (count($this->team['team_members']) > 1) {
            unset($this->team['team_members'][$index]);
            $this->team['team_members'] = array_values($this->team['team_members']);
        }
    }

    public function addValue()
    {
        $this->values['values'][] = '';
    }

    public function removeValue($index)
    {
        if (count($this->values['values']) > 1) {
            unset($this->values['values'][$index]);
            $this->values['values'] = array_values($this->values['values']);
        }
    }

    public function addPartner()
    {
        $this->partnerships['partners'][] = [
            'name' => '',
            'type' => '',
            'description' => ''
        ];
    }

    public function removePartner($index)
    {
        if (count($this->partnerships['partners']) > 1) {
            unset($this->partnerships['partners'][$index]);
            $this->partnerships['partners'] = array_values($this->partnerships['partners']);
        }
    }

    public function addCertification()
    {
        $this->certifications['certifications'][] = [
            'name' => '',
            'authority' => '',
            'issue_date' => '',
            'expiry_date' => ''
        ];
    }

    public function removeCertification($index)
    {
        if (count($this->certifications['certifications']) > 1) {
            unset($this->certifications['certifications'][$index]);
            $this->certifications['certifications'] = array_values($this->certifications['certifications']);
        }
    }

    public function saveSection($sectionType)
    {
        $this->validate($this->getSectionRules($sectionType));

        try {
            $data = [];
            $content = null;
            $image = null;

            switch ($sectionType) {
                case 'history':
                    $content = $this->history['content'];
                    $data = ['milestones' => $this->history['milestones']];
                    break;

                case 'mission':
                    $data = [
                        'mission' => $this->mission['mission'],
                        'vision' => $this->mission['vision'],
                        'philosophy' => $this->mission['philosophy']
                    ];
                    break;

                case 'team':
                    $data = ['team_members' => $this->team['team_members']];
                    // Handle team member image uploads
                    foreach ($this->teamMemberImages as $index => $image) {
                        if ($image) {
                            $path = $image->store('team-members', 'public');
                            $data['team_members'][$index]['image'] = $path;
                        }
                    }
                    break;

                case 'values':
                    $content = $this->values['content'];
                    $data = [
                        'culture' => $this->values['culture'],
                        'values' => array_filter($this->values['values'])
                    ];
                    break;

                case 'quality':
                    $content = $this->quality['content'];
                    $data = [
                        'standards' => $this->quality['standards'],
                        'metrics' => $this->quality['metrics']
                    ];
                    break;

                case 'innovation':
                    $content = $this->innovation['content'];
                    $data = [
                        'focus_areas' => $this->innovation['focus_areas'],
                        'rd_investment' => $this->innovation['rd_investment'],
                        'patents_count' => $this->innovation['patents_count'],
                        'research_partnerships' => $this->innovation['research_partnerships']
                    ];
                    break;

                case 'partnerships':
                    $content = $this->partnerships['content'];
                    $data = ['partners' => $this->partnerships['partners']];
                    break;

                case 'certifications':
                    $data = [
                        'certifications' => $this->certifications['certifications'],
                        'compliance' => $this->certifications['compliance']
                    ];
                    // Handle certification file uploads
                    foreach ($this->certificationFiles as $index => $file) {
                        if ($file) {
                            $path = $file->store('certifications', 'public');
                            $data['certifications'][$index]['file'] = $path;
                        }
                    }
                    break;
            }

            AboutSection::updateOrCreate(
                ['section_type' => $sectionType],
                [
                    'content' => $content,
                    'data' => $data,
                    'image' => $image,
                    'is_active' => true
                ]
            );

            $this->dispatch('section-saved', message: ucfirst($sectionType) . ' section saved successfully!');
        } catch (\Exception $e) {
            $this->dispatch('section-error', message: 'Error saving ' . $sectionType . ' section: ' . $e->getMessage());
        }
    }

    public function saveAll()
    {
        $this->validate();

        foreach (AboutSection::getSectionTypes() as $type => $name) {
            $this->saveSection($type);
        }

        $this->dispatch('all-saved', message: 'All sections saved successfully!');
    }

    // private function getSectionRules($sectionType)
    // {
    //     $rules = [];
    //     foreach ($this->rules as $key => $rule) {
    //         if (str_starts_with($key, $sectionType . '.')) {
    //             $rules[$key] = $rule;
    //         }
    //     }
    //     return $rules;
    // }


    private function getSectionRules($sectionType)
    {
        $sectionRules = [];

        switch ($sectionType) {
            case 'history':
                $sectionRules = [
                    'history.content' => 'nullable|string',
                    'history.milestones' => 'nullable|string',
                ];
                break;

            case 'mission':
                $sectionRules = [
                    'mission.mission' => 'nullable|string',
                    'mission.vision' => 'nullable|string',
                    'mission.philosophy' => 'nullable|string',
                ];
                break;

            case 'team':
                $sectionRules = [
                    'team.team_members.*.name' => 'required|string|max:255',
                    'team.team_members.*.position' => 'required|string|max:255',
                    'team.team_members.*.department' => 'required|string|max:255',
                    'team.team_members.*.description' => 'nullable|string',
                    'team.team_members.*.email' => 'nullable|email',
                    'teamMemberImages.*' => 'nullable|image|max:2048',
                ];
                break;

            case 'values':
                $sectionRules = [
                    'values.content' => 'nullable|string',
                    'values.culture' => 'nullable|string',
                    'values.values.*' => 'nullable|string|max:255',
                ];
                break;

            case 'quality':
                $sectionRules = [
                    'quality.content' => 'nullable|string',
                    'quality.standards' => 'nullable|array',
                    'quality.metrics.defect_rate' => 'nullable|numeric|min:0|max:100',
                    'quality.metrics.customer_satisfaction' => 'nullable|numeric|min:0|max:100',
                ];
                break;

            case 'innovation':
                $sectionRules = [
                    'innovation.content' => 'nullable|string',
                    'innovation.focus_areas' => 'nullable|array',
                    'innovation.rd_investment' => 'nullable|numeric|min:0',
                    'innovation.patents_count' => 'nullable|integer|min:0',
                    'innovation.research_partnerships' => 'nullable|integer|min:0',
                ];
                break;

            case 'partnerships':
                $sectionRules = [
                    'partnerships.content' => 'nullable|string',
                    'partnerships.partners.*.name' => 'nullable|string|max:255',
                    'partnerships.partners.*.type' => 'nullable|string|max:255',
                    'partnerships.partners.*.description' => 'nullable|string',
                ];
                break;

            case 'certifications':
                $sectionRules = [
                    'certifications.certifications.*.name' => 'nullable|string|max:255',
                    'certifications.certifications.*.authority' => 'nullable|string|max:255',
                    'certifications.certifications.*.issue_date' => 'nullable|date',
                    'certifications.certifications.*.expiry_date' => 'nullable|date',
                    'certificationFiles.*' => 'nullable|file|mimes:pdf,jpg,png|max:5120',
                    'certifications.compliance' => 'nullable|array',
                ];
                break;
        }

        return $sectionRules;
    }

    public function setActiveTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function getTabIcon($type)
    {
        $icons = [
            'history' => 'history',
            'mission' => 'target',
            'team' => 'account-group',
            'values' => 'heart',
            'quality' => 'certificate',
            'innovation' => 'lightbulb-on',
            'partnerships' => 'handshake',
            'certifications' => 'file-document',
        ];

        return $icons[$type] ?? 'circle';
    }

    public function render()
    {
        return view('livewire.admin.about.edit-about', [
            'sectionTypes' => AboutSection::getSectionTypes()
        ]);
    }
}
