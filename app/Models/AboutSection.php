<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class AboutSection extends Model
{
    protected $fillable = [
        'section_type',
        'content',
        'data',
        'image',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'data' => 'array',
        'is_active' => 'boolean'
    ];

    // Constants for section types
    const TYPE_HISTORY = 'history';
    const TYPE_MISSION = 'mission';
    const TYPE_TEAM = 'team';
    const TYPE_VALUES = 'values';
    const TYPE_QUALITY = 'quality';
    const TYPE_INNOVATION = 'innovation';
    const TYPE_PARTNERSHIPS = 'partnerships';
    const TYPE_CERTIFICATIONS = 'certifications';

    /**
     * Get all section types
     */
    public static function getSectionTypes(): array
    {
        return [
            self::TYPE_HISTORY => 'Our History',
            self::TYPE_MISSION => 'Mission & Vision',
            self::TYPE_TEAM => 'Our Team',
            self::TYPE_VALUES => 'Our Values',
            self::TYPE_QUALITY => 'Quality Assurance',
            self::TYPE_INNOVATION => 'Innovation',
            self::TYPE_PARTNERSHIPS => 'Partnerships',
            self::TYPE_CERTIFICATIONS => 'Certifications',
        ];
    }

    /**
     * Scope for active sections
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for specific section type
     */
    public function scopeType($query, $type)
    {
        return $query->where('section_type', $type);
    }

    /**
     * Scope ordered by sort order
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order')->orderBy('created_at');
    }

    /**
     * Get section title
     */
    public function getTitleAttribute(): string
    {
        return self::getSectionTypes()[$this->section_type] ?? ucfirst($this->section_type);
    }

    /**
     * Accessor for team members data
     */
    public function getTeamMembersAttribute(): array
    {
        if ($this->section_type === self::TYPE_TEAM) {
            return $this->data['team_members'] ?? [];
        }
        return [];
    }

    /**
     * Accessor for values list
     */
    public function getValuesListAttribute(): array
    {
        if ($this->section_type === self::TYPE_VALUES) {
            return $this->data['values'] ?? [];
        }
        return [];
    }

    /**
     * Accessor for partnerships
     */
    public function getPartnershipsAttribute(): array
    {
        if ($this->section_type === self::TYPE_PARTNERSHIPS) {
            return $this->data['partners'] ?? [];
        }
        return [];
    }

    /**
     * Accessor for certifications
     */
    public function getCertificationsAttribute(): array
    {
        if ($this->section_type === self::TYPE_CERTIFICATIONS) {
            return $this->data['certifications'] ?? [];
        }
        return [];
    }

    /**
     * Accessor for quality standards
     */
    public function getQualityStandardsAttribute(): array
    {
        if ($this->section_type === self::TYPE_QUALITY) {
            return $this->data['standards'] ?? [];
        }
        return [];
    }

    /**
     * Accessor for innovation focus areas
     */
    public function getInnovationFocusAreasAttribute(): array
    {
        if ($this->section_type === self::TYPE_INNOVATION) {
            return $this->data['focus_areas'] ?? [];
        }
        return [];
    }

    /**
     * Check if section has data
     */
    public function getHasDataAttribute(): bool
    {
        return !empty($this->content) || !empty($this->data) || !empty($this->image);
    }
}