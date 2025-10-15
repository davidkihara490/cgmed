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
                            @if (!empty($history['milestones']))
                                <div class="milestones-content">
                                    {!! nl2br(e($history['milestones'])) !!}
                                </div>
                            @else
                                <p class="text-muted text-center">No milestones available yet.</p>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <style>
        .history-content {
            background: #fff;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
        }

        .content-display {
            line-height: 1.8;
            font-size: 1.1rem;
            color: #333;
        }

        .milestones-timeline {
            background: #f8f9fa;
            padding: 30px;
            border-radius: 10px;
            border-left: 4px solid var(--primary);
        }

        .milestones-content {
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
