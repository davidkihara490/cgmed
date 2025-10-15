@extends('master.layouts')

@section('content')
    <!-- Navigation -->
    @include('master.header')

    <!-- Hero Section -->
    <section class="hero-section">
        <div class="container">
            <h1>{{ ucfirst($data->section_type) }}</h1>
        </div>
    </section>

    @if ($data->section_type == 'history')
        <!-- History Section -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-title">Our History</h2>
                    </div>
                </div>

                <!-- Company History Content -->
                <div class="row mb-5">
                    <div class="col-lg-8 mx-auto">
                        <div class="history-content">
                            <div class="mb-4">
                                <h3 class="h4 mb-3">Our Journey</h3>
                                <div class="content-display">
                                    @if (!empty($data['content']))
                                        {!! nl2br(e($data['content'])) !!}
                                    @else
                                        <p class="text-muted">No company history content available yet.</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Key Milestones -->
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <h3 class="h4 text-center mb-4">Key Milestones & Achievements</h3>
                        <div class="milestones-timeline">
                            @if (!empty($data['milestones']))
                                <div class="milestones-content">
                                    {!! nl2br(e($data['milestones'])) !!}
                                </div>
                            @else
                                <p class="text-muted text-center">No milestones available yet.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @elseif ($data->section_type == 'mission')
        <!-- Mission Section -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-title">Our Mission & Vision</h2>
                    </div>
                </div>

                <!-- Mission Content -->
                <div class="row mb-5">
                    <div class="col-lg-10 mx-auto">
                        <div class="mission-content">
                            <div class="row">
                                <!-- Mission -->
                                <div class="col-md-6 mb-4">
                                    <div class="mission-card">
                                        <div class="mission-icon">
                                            <i class="fas fa-bullseye"></i>
                                        </div>
                                        <h3 class="h4 mb-3">Our Mission</h3>
                                        <div class="content-display">
                                            @if (!empty($data['mission']))
                                                {!! nl2br(e($data['mission'])) !!}
                                            @else
                                                <p class="text-muted">No mission statement available yet.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Vision -->
                                <div class="col-md-6 mb-4">
                                    <div class="vision-card">
                                        <div class="vision-icon">
                                            <i class="fas fa-eye"></i>
                                        </div>
                                        <h3 class="h4 mb-3">Our Vision</h3>
                                        <div class="content-display">
                                            @if (!empty($data['vision']))
                                                {!! nl2br(e($data['vision'])) !!}
                                            @else
                                                <p class="text-muted">No vision statement available yet.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Philosophy -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="philosophy-timeline">
                                        <div class="philosophy-icon">
                                            <i class="fas fa-heart"></i>
                                        </div>
                                        <h3 class="h4 text-center mb-4">Our Philosophy</h3>
                                        <div class="philosophy-content">
                                            @if (!empty($data['philosophy']))
                                                {!! nl2br(e($data['philosophy'])) !!}
                                            @else
                                                <p class="text-muted text-center">No company philosophy available yet.</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @elseif ($data->section_type == 'team')
        <!-- Team Section -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-title">Our Team</h2>
                    </div>
                </div>

                <div class="row">
                    @if (!empty($data['team_members']) && count($data['team_members']) > 0)
                        @foreach ($data['team_members'] as $member)
                            <div class="col-lg-4 col-md-6 mb-4">
                                <div class="team-member-card">
                                    <div class="team-member-img">
                                        @if (!empty($member['image']))
                                            <img src="{{ $member['image'] }}" alt="{{ $member['name'] }}" class="img-fluid">
                                        @else
                                            <div class="team-member-placeholder">
                                                <i class="fas fa-user-md"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div class="team-member-info">
                                        <h4 class="team-member-name">{{ $member['name'] ?? 'Team Member' }}</h4>
                                        <p class="team-member-position">{{ $member['position'] ?? '' }}</p>
                                        <p class="team-member-department">{{ ucfirst($member['department'] ?? '') }}</p>
                                        <p class="team-member-description">{{ $member['description'] ?? '' }}</p>
                                        @if (!empty($member['email']))
                                            <a href="mailto:{{ $member['email'] }}" class="team-member-email">
                                                <i class="fas fa-envelope me-2"></i>{{ $member['email'] }}
                                            </a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-12 text-center">
                            <p class="text-muted">No team members information available yet.</p>
                        </div>
                    @endif
                </div>
            </div>
        </section>

    @elseif ($data->section_type == 'values')
        <!-- Values Section -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-title">Our Values</h2>
                    </div>
                </div>

                <!-- Core Values -->
                <div class="row mb-5">
                    <div class="col-lg-8 mx-auto">
                        <div class="values-content">
                            <h3 class="h4 mb-4">Core Values Statement</h3>
                            <div class="content-display">
                                @if (!empty($data['content']))
                                    {!! nl2br(e($data['content'])) !!}
                                @else
                                    <p class="text-muted">No core values statement available yet.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Values List -->
                @if (!empty($data['values']) && count($data['values']) > 0)
                    <div class="row mb-5">
                        <div class="col-12">
                            <h3 class="h4 text-center mb-4">Our Core Values</h3>
                            <div class="row">
                                @foreach ($data['values'] as $value)
                                    @if (!empty($value))
                                        <div class="col-md-4 mb-3">
                                            <div class="value-item">
                                                <div class="value-icon">
                                                    <i class="fas fa-star"></i>
                                                </div>
                                                <h5>{{ $value }}</h5>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Company Culture -->
                <div class="row">
                    <div class="col-lg-10 mx-auto">
                        <div class="culture-timeline">
                            <h3 class="h4 text-center mb-4">Company Culture</h3>
                            <div class="culture-content">
                                @if (!empty($data['culture']))
                                    {!! nl2br(e($data['culture'])) !!}
                                @else
                                    <p class="text-muted text-center">No company culture information available yet.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @elseif ($data->section_type == 'quality')
        <!-- Quality Assurance Section -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-title">Quality Assurance</h2>
                    </div>
                </div>

                <!-- Quality Content -->
                <div class="row mb-5">
                    <div class="col-lg-10 mx-auto">
                        <div class="quality-content">
                            <h3 class="h4 mb-4">Quality Assurance Processes</h3>
                            <div class="content-display">
                                @if (!empty($data['content']))
                                    {!! nl2br(e($data['content'])) !!}
                                @else
                                    <p class="text-muted">No quality assurance information available yet.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quality Standards -->
                @if (!empty($data['standards']) && count($data['standards']) > 0)
                    <div class="row mb-5">
                        <div class="col-12">
                            <h3 class="h4 text-center mb-4">Quality Standards & Certifications</h3>
                            <div class="row">
                                @foreach ($data['standards'] as $standard)
                                    <div class="col-md-6 mb-3">
                                        <div class="standard-item">
                                            <div class="standard-icon">
                                                <i class="fas fa-certificate"></i>
                                            </div>
                                            <h5>{{ $standard }}</h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Quality Metrics -->
                @if (!empty($data['metrics']))
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="metrics-timeline">
                                <h3 class="h4 text-center mb-4">Quality Metrics</h3>
                                <div class="row">
                                    @if (!empty($data['metrics']['defect_rate']))
                                        <div class="col-md-6 mb-3">
                                            <div class="metric-item text-center">
                                                <div class="metric-value">{{ $data['metrics']['defect_rate'] }}%</div>
                                                <div class="metric-label">Defect Rate</div>
                                            </div>
                                        </div>
                                    @endif
                                    @if (!empty($data['metrics']['customer_satisfaction']))
                                        <div class="col-md-6 mb-3">
                                            <div class="metric-item text-center">
                                                <div class="metric-value">{{ $data['metrics']['customer_satisfaction'] }}%</div>
                                                <div class="metric-label">Customer Satisfaction</div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>

    @elseif ($data->section_type == 'innovation')
        <!-- Innovation Section -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-title">Innovation & Research</h2>
                    </div>
                </div>

                <!-- Innovation Content -->
                <div class="row mb-5">
                    <div class="col-lg-10 mx-auto">
                        <div class="innovation-content">
                            <h3 class="h4 mb-4">Innovation Strategy</h3>
                            <div class="content-display">
                                @if (!empty($data['content']))
                                    {!! nl2br(e($data['content'])) !!}
                                @else
                                    <p class="text-muted">No innovation strategy information available yet.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- R&D Focus Areas -->
                @if (!empty($data['focus_areas']) && count($data['focus_areas']) > 0)
                    <div class="row mb-5">
                        <div class="col-12">
                            <h3 class="h4 text-center mb-4">R&D Focus Areas</h3>
                            <div class="row">
                                @foreach ($data['focus_areas'] as $area)
                                    <div class="col-md-4 mb-3">
                                        <div class="focus-area-item">
                                            <div class="focus-area-icon">
                                                <i class="fas fa-flask"></i>
                                            </div>
                                            <h5>{{ ucwords(str_replace('-', ' ', $area)) }}</h5>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Innovation Metrics -->
                <div class="row">
                    <div class="col-lg-8 mx-auto">
                        <div class="innovation-metrics">
                            <h3 class="h4 text-center mb-4">Innovation Metrics</h3>
                            <div class="row">
                                @if (!empty($data['rd_investment']))
                                    <div class="col-md-4 mb-3">
                                        <div class="innovation-metric text-center">
                                            <div class="metric-value">${{ number_format($data['rd_investment']) }}</div>
                                            <div class="metric-label">R&D Investment</div>
                                        </div>
                                    </div>
                                @endif
                                @if (!empty($data['patents_count']))
                                    <div class="col-md-4 mb-3">
                                        <div class="innovation-metric text-center">
                                            <div class="metric-value">{{ $data['patents_count'] }}</div>
                                            <div class="metric-label">Patents Held</div>
                                        </div>
                                    </div>
                                @endif
                                @if (!empty($data['research_partnerships']))
                                    <div class="col-md-4 mb-3">
                                        <div class="innovation-metric text-center">
                                            <div class="metric-value">{{ $data['research_partnerships'] }}</div>
                                            <div class="metric-label">Research Partnerships</div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    @elseif ($data->section_type == 'partnerships')
        <!-- Partnerships Section -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-title">Partnerships & Collaborations</h2>
                    </div>
                </div>

                <!-- Partnerships Content -->
                <div class="row mb-5">
                    <div class="col-lg-10 mx-auto">
                        <div class="partnerships-content">
                            <h3 class="h4 mb-4">Partnerships Overview</h3>
                            <div class="content-display">
                                @if (!empty($data['content']))
                                    {!! nl2br(e($data['content'])) !!}
                                @else
                                    <p class="text-muted">No partnerships overview available yet.</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Partners List -->
                @if (!empty($data['partners']) && count($data['partners']) > 0)
                    <div class="row">
                        @foreach ($data['partners'] as $partner)
                            <div class="col-lg-6 mb-4">
                                <div class="partner-card">
                                    <div class="partner-icon">
                                        <i class="fas fa-handshake"></i>
                                    </div>
                                    <div class="partner-info">
                                        <h4 class="partner-name">{{ $partner['name'] ?? 'Partner' }}</h4>
                                        <p class="partner-type">{{ ucfirst($partner['type'] ?? '') }}</p>
                                        <p class="partner-description">{{ $partner['description'] ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="col-12 text-center">
                        <p class="text-muted">No partnership information available yet.</p>
                    </div>
                @endif
            </div>
        </section>

    @elseif ($data->section_type == 'certifications')
        <!-- Certifications Section -->
        <section class="py-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h2 class="section-title">Certifications & Accreditations</h2>
                    </div>
                </div>

                <!-- Certifications List -->
                @if (!empty($data['certifications']) && count($data['certifications']) > 0)
                    <div class="row mb-5">
                        @foreach ($data['certifications'] as $certification)
                            <div class="col-lg-6 mb-4">
                                <div class="certification-card">
                                    <div class="certification-header">
                                        <div class="certification-icon">
                                            <i class="fas fa-award"></i>
                                        </div>
                                        <div class="certification-title">
                                            <h4>{{ $certification['name'] ?? 'Certification' }}</h4>
                                            <p class="certification-authority">{{ $certification['authority'] ?? '' }}</p>
                                        </div>
                                    </div>
                                    <div class="certification-details">
                                        @if (!empty($certification['issue_date']))
                                            <p><strong>Issued:</strong> {{ \Carbon\Carbon::parse($certification['issue_date'])->format('M d, Y') }}</p>
                                        @endif
                                        @if (!empty($certification['expiry_date']))
                                            <p><strong>Expires:</strong> {{ \Carbon\Carbon::parse($certification['expiry_date'])->format('M d, Y') }}</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="col-12 text-center mb-5">
                        <p class="text-muted">No certifications information available yet.</p>
                    </div>
                @endif

                <!-- Compliance Standards -->
                @if (!empty($data['compliance']) && count($data['compliance']) > 0)
                    <div class="row">
                        <div class="col-lg-8 mx-auto">
                            <div class="compliance-timeline">
                                <h3 class="h4 text-center mb-4">Industry Standards Compliance</h3>
                                <div class="row">
                                    @foreach ($data['compliance'] as $standard)
                                        <div class="col-md-6 mb-3">
                                            <div class="compliance-item">
                                                <div class="compliance-icon">
                                                    <i class="fas fa-check-circle"></i>
                                                </div>
                                                <h5>{{ $standard }}</h5>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </section>
    @endif

    <style>
        /* History Styles */
        .history-content {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .milestones-timeline {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            border-left: 4px solid var(--primary);
        }

        /* Mission Styles */
        .mission-card, .vision-card {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            height: 100%;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .mission-card:hover, .vision-card:hover {
            transform: translateY(-5px);
        }

        .mission-card {
            border-top: 4px solid #1a76d2;
        }

        .vision-card {
            border-top: 4px solid #28a745;
        }

        .mission-icon, .vision-icon, .philosophy-icon {
            width: 60px;
            height: 60px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
            font-size: 1.5rem;
            color: white;
        }

        .vision-icon {
            background: #28a745;
        }

        .philosophy-icon {
            background: #ff6b6b;
            margin-bottom: 20px;
        }

        .philosophy-timeline {
            background: #f8f9fa;
            padding: 40px;
            border-radius: 10px;
            border-left: 4px solid #ff6b6b;
            text-align: center;
        }

        /* Team Styles */
        .team-member-card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            overflow: hidden;
            transition: transform 0.3s ease;
        }

        .team-member-card:hover {
            transform: translateY(-5px);
        }

        .team-member-img {
            height: 250px;
            overflow: hidden;
        }

        .team-member-img img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .team-member-placeholder {
            height: 250px;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 4rem;
            color: var(--primary);
        }

        .team-member-info {
            padding: 25px;
        }

        .team-member-name {
            color: var(--primary);
            margin-bottom: 5px;
        }

        .team-member-position {
            font-weight: 600;
            color: #333;
            margin-bottom: 5px;
        }

        .team-member-department {
            color: #6c757d;
            margin-bottom: 15px;
        }

        .team-member-description {
            color: #555;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .team-member-email {
            color: var(--primary);
            text-decoration: none;
        }

        /* Values Styles */
        .values-content {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .value-item {
            text-align: center;
            padding: 25px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .value-item:hover {
            transform: translateY(-5px);
        }

        .value-icon {
            width: 50px;
            height: 50px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: white;
            font-size: 1.2rem;
        }

        .culture-timeline {
            background: #f8f9fa;
            padding: 40px;
            border-radius: 10px;
            border-left: 4px solid var(--primary);
        }

        /* Quality Styles */
        .quality-content {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .standard-item {
            display: flex;
            align-items: center;
            padding: 20px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .standard-icon {
            width: 50px;
            height: 50px;
            background: #28a745;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            color: white;
            font-size: 1.2rem;
        }

        .metrics-timeline {
            background: #f8f9fa;
            padding: 40px;
            border-radius: 10px;
            border-left: 4px solid #28a745;
        }

        .metric-item {
            padding: 20px;
        }

        .metric-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: var(--primary);
            margin-bottom: 10px;
        }

        .metric-label {
            font-size: 1.1rem;
            color: #6c757d;
        }

        /* Innovation Styles */
        .innovation-content {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .focus-area-item {
            text-align: center;
            padding: 25px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .focus-area-item:hover {
            transform: translateY(-5px);
        }

        .focus-area-icon {
            width: 50px;
            height: 50px;
            background: #ff6b6b;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            color: white;
            font-size: 1.2rem;
        }

        .innovation-metrics {
            background: #f8f9fa;
            padding: 40px;
            border-radius: 10px;
            border-left: 4px solid #ff6b6b;
        }

        .innovation-metric {
            padding: 20px;
        }

        /* Partnerships Styles */
        .partnerships-content {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .partner-card {
            display: flex;
            align-items: flex-start;
            padding: 25px;
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .partner-card:hover {
            transform: translateY(-5px);
        }

        .partner-icon {
            width: 50px;
            height: 50px;
            background: var(--primary);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            color: white;
            font-size: 1.2rem;
            flex-shrink: 0;
        }

        .partner-name {
            color: var(--primary);
            margin-bottom: 5px;
        }

        .partner-type {
            font-weight: 600;
            color: #333;
            margin-bottom: 10px;
        }

        .partner-description {
            color: #555;
            line-height: 1.6;
        }

        /* Certifications Styles */
        .certification-card {
            background: #fff;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease;
        }

        .certification-card:hover {
            transform: translateY(-5px);
        }

        .certification-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .certification-icon {
            width: 60px;
            height: 60px;
            background: #ffc107;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 20px;
            color: white;
            font-size: 1.5rem;
            flex-shrink: 0;
        }

        .certification-title h4 {
            color: var(--primary);
            margin-bottom: 5px;
        }

        .certification-authority {
            color: #6c757d;
            margin: 0;
        }

        .compliance-timeline {
            background: #f8f9fa;
            padding: 40px;
            border-radius: 10px;
            border-left: 4px solid #ffc107;
        }

        .compliance-item {
            display: flex;
            align-items: center;
            padding: 15px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.08);
        }

        .compliance-icon {
            width: 40px;
            height: 40px;
            background: #28a745;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
            font-size: 1rem;
            flex-shrink: 0;
        }

        /* Common Styles */
        .content-display {
            line-height: 1.8;
            font-size: 1.1rem;
            color: #333;
        }

        .milestones-content, .philosophy-content, .culture-content {
            line-height: 1.8;
            font-size: 1.1rem;
            color: #333;
        }

        .section-title {
            position: relative;
            margin-bottom: 50px;
            text-align: center;
            font-size: 2.5rem;
        }

        .section-title:after {
            content: '';
            position: absolute;
            width: 80px;
            height: 3px;
            background-color: var(--primary);
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
        }

        .h4 {
            color: var(--primary);
            font-weight: 600;
        }

        .text-muted {
            font-style: italic;
        }
    </style>
@endsection