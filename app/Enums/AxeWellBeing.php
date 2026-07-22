<?php

namespace App\Enums;

enum AxeWellBeing:string
{
    case SANTE_PHYSIQUE = 'sante_physique';
    case SANTE_MENTALE = 'sante_mentale';
    case BIEN_ETRE_SOCIAL = 'bien_etre_social';
    case EDUCATION_PREVENTION = 'education_prevention';
    case DEVELOPPEMENT_COMMUNAUTAIRE = 'developpement_communautaire';

    public function label(): string
    {
        return match ($this) {
            self::SANTE_PHYSIQUE => 'Santé physique',
            self::SANTE_MENTALE => 'Santé mentale',
            self::BIEN_ETRE_SOCIAL => 'Bien-être social',
            self::EDUCATION_PREVENTION => 'Education',
            self::DEVELOPPEMENT_COMMUNAUTAIRE => 'Développement communautaire',
        };
    }

    public function icon(): string
    {
        return match ($this) {
            self::SANTE_PHYSIQUE => 'bi-heart-pulse',
            self::SANTE_MENTALE => 'bi-brain',
            self::BIEN_ETRE_SOCIAL => 'bi-people',
            self::EDUCATION_PREVENTION => 'bi-journal-medical',
            self::DEVELOPPEMENT_COMMUNAUTAIRE => 'bi-building',
        };
    }

    public static function all(): array
    {
        return [
            self::SANTE_PHYSIQUE,
            self::SANTE_MENTALE,
            self::BIEN_ETRE_SOCIAL,
            self::EDUCATION_PREVENTION,
            self::DEVELOPPEMENT_COMMUNAUTAIRE,
        ];
    }
}
