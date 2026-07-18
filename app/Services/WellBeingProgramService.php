<?php

namespace App\Services;

use App\Enums\AxeWellBeing;
use App\Models\Avis;
use App\Models\Message;
use App\Models\User;

class WellBeingProgramService
{
    public function axes(): array
    {
        return collect(AxeWellBeing::all())->map(function (AxeWellBeing $axe) {
            return match ($axe) {
                AxeWellBeing::SANTE_PHYSIQUE => [
                    'code' => $axe->value,
                    'label' => $axe->label(),
                    'icon' => $axe->icon(),
                    'description' => 'Sensibilisation, dépistage gratuit et accès à l’eau potable et aux kits d’hygiène.',
                    'objectives' => [
                        'Sensibiliser les jeunes et familles aux bonnes pratiques d’hygiène et de nutrition.',
                        'Organiser des journées de dépistage gratuit pour la tension, le diabète et le VIH.',
                        'Faciliter l’accès à l’eau potable et aux kits d’hygiène dans les écoles et quartiers.',
                    ],
                ],
                AxeWellBeing::SANTE_MENTALE => [
                    'code' => $axe->value,
                    'label' => $axe->label(),
                    'icon' => $axe->icon(),
                    'description' => 'Création d’espaces d’écoute, prévention du stress et formation de pairs-éducateurs.',
                    'objectives' => [
                        'Lutter contre le stress, l’anxiété et la dépression chez les jeunes de 5 à 15 ans.',
                        'Créer des espaces d’écoute et de parole pour briser les tabous.',
                        'Former des pairs-éducateurs à la gestion du stress et à la prévention du suicide.',
                    ],
                ],
                AxeWellBeing::BIEN_ETRE_SOCIAL => [
                    'code' => $axe->value,
                    'label' => $axe->label(),
                    'icon' => $axe->icon(),
                    'description' => 'Cohésion sociale, autonomisation des femmes et lutte contre les violences basées sur le genre.',
                    'objectives' => [
                        'Promouvoir la cohésion sociale et la solidarité entre les communautés.',
                        'Accompagner les femmes et jeunes filles dans leur autonomisation.',
                        'Lutter contre les violences basées sur le genre et le harcèlement.',
                    ],
                ],
                AxeWellBeing::EDUCATION_PREVENTION => [
                    'code' => $axe->value,
                    'label' => $axe->label(),
                    'icon' => $axe->icon(),
                    'description' => 'Éducation sanitaire, prévention des addictions et premiers secours.',
                    'objectives' => [
                        'Éduquer sur la santé sexuelle et reproductive en milieu scolaire.',
                        'Sensibiliser aux dangers des addictions : drogue, alcool, réseaux sociaux.',
                        'Former aux premiers secours et à la gestion des urgences.',
                    ],
                ],
                AxeWellBeing::DEVELOPPEMENT_COMMUNAUTAIRE => [
                    'code' => $axe->value,
                    'label' => $axe->label(),
                    'icon' => $axe->icon(),
                    'description' => 'Mobilisation communautaire, partenariats institutionnels et activités sportives et culturelles.',
                    'objectives' => [
                        'Mobiliser la communauté de Kaélé autour des questions de bien-être.',
                        'Créer des partenariats avec la Mairie, les CSI, les écoles et les autres ONG.',
                        'Mettre en place des activités sportives, culturelles et de détente pour réduire le stress.',
                    ],
                ],
            };
        })->values()->all();
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
