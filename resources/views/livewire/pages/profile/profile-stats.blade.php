<div class="row mb-2">
    <!-- Ideas Submitted -->
    <div class="col-md-3 mb-3 col-sm-6">
        <div class="stat-card stat-purple">
            <div class="stat-icon">
                <i class="bi bi-lightbulb"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $ideasSubmitted }}</h3>
                <span>{{ __('profile.stats.ideas_submitted') }}</span>
            </div>
        </div>
    </div>

    <!-- Ideas Published -->
    <div class="col-md-3 mb-3 col-sm-6">
        <div class="stat-card stat-blue">
            <div class="stat-icon">
                <i class="bi bi-check-circle"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $ideasPublished }}</h3>
                <span>{{ __('profile.stats.ideas_published') }}</span>
            </div>
        </div>
    </div>

    <!-- Investment Offers -->
    <div class="col-md-3 mb-3 col-sm-6">
        <div class="stat-card stat-green">
            <div class="stat-icon">
                <i class="bi bi-graph-up-arrow"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $investmentOffers }}</h3>
                <span>{{ __('profile.stats.investment_offers') }}</span>
            </div>
        </div>
    </div>

    <!-- Overall Rating -->
    <div class="col-md-3 mb-3 col-sm-6">
        <div class="stat-card stat-orange">
            <div class="stat-icon">
                <i class="bi bi-star-fill"></i>
            </div>
            <div class="stat-info">
                <h3>{{ $investmentPublished }}</h3>
                <span>{{ __('profile.stats.investment_published') }}</span>
            </div>
        </div>
    </div>
</div>

@push('styles')
    <style>
        .stat-card {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid #f0f0f0;
            height: 100%;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        .stat-purple {
            border-left: 4px solid #8B5CF6;
        }

        .stat-blue {
            border-left: 4px solid #3B82F6;
        }

        .stat-green {
            border-left: 4px solid #10B981;
        }

        .stat-orange {
            border-left: 4px solid #F59E0B;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .stat-purple .stat-icon {
            background: rgba(139, 92, 246, 0.1);
            color: #8B5CF6;
        }

        .stat-blue .stat-icon {
            background: rgba(59, 130, 246, 0.1);
            color: #3B82F6;
        }

        .stat-green .stat-icon {
            background: rgba(16, 185, 129, 0.1);
            color: #10B981;
        }

        .stat-orange .stat-icon {
            background: rgba(245, 158, 11, 0.1);
            color: #F59E0B;
        }

        .stat-info h3 {
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 0.25rem;
            color: #1F2937;
        }

        .stat-info span {
            font-size: 0.9rem;
            color: #6B7280;
            font-weight: 500;
        }

        @media (max-width: 768px) {
            .pe-md-0 {
                padding-right: 12px !important;
            }

            .ps-md-0 {
                padding-left: 12px !important;
            }

            .stat-card {
                padding: 1rem;
            }

            .stat-info h3 {
                font-size: 1.5rem;
            }
        }
    </style>
@endpush
