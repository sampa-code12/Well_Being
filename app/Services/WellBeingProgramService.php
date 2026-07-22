<?php

namespace App\Services;

use App\Enums\AxeWellBeing;
use App\Models\Avis;
use App\Models\Message;
use App\Models\SystemSetting;
use App\Models\User;

class WellBeingProgramService
{
    private function getJsonSetting(string $key, array $default = []): array
    {
        $value = SystemSetting::getValue($key);

        if (is_string($value)) {
            $decoded = json_decode($value, true);
            return is_array($decoded) ? $decoded : $default;
        }

        return is_array($value) ? $value : $default;
    }

    public function axes(): array
    {
        return $this->getJsonSetting('wellbeing_axes');
    }

    public function objectives(): array
    {
        $rows = [];
        foreach ($this->axes() as $axis) {
            foreach ($axis['objectives'] as $index => $objective) {
                $rows[] = [
                    'axe' => $axis['label'],
                    'icon' => $axis['icon'],
                    'objectif' => $objective,
                    'priorite' => $index === 0 ? 'priorité 1' : ($index === 1 ? 'priorité 2' : 'priorité 3'),
                ];
            }
        }

        return $rows;
    }

    public function globalObjective(): string
    {
        return SystemSetting::getValue(
            'wellbeing_global_objective',
            'Devenir l’association de référence à Maroua, Cameroun, pour le bien-être physique, mental et social et toucher directement 5 000 personnes par an.'
        );
    }

    public function dashboardMetrics(): array
    {
        $members = User::where('role', 'membre')->count();
        $admins = User::where('role', 'admin')->count();
        $programmes = count($this->axes());
        $avis = Avis::count();
        $messages = Message::count();
        $annualTarget = 5000;
        $progress = min(100, (int) round((($members * 30) + ($programmes * 10) + ($avis * 3) + ($messages * 2)) / max(1, $annualTarget) * 100));

        return [
            'members' => $members,
            'admins' => $admins,
            'programmes' => $programmes,
            'avis' => $avis,
            'messages' => $messages,
            'annualTarget' => $annualTarget,
            'progress' => $progress,
            'annualReach' => min($annualTarget, max(0, $members * 20 + $programmes * 16 + $messages * 5 + $avis * 3)),
        ];
    }
}
