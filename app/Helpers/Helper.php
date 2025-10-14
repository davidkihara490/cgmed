<?php

class Helper
{
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
}