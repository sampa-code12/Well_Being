<?php

namespace Tests\Unit;

use App\Enums\AxeWellBeing;
use PHPUnit\Framework\TestCase;

class AxeWellBeingTest extends TestCase
{
    public function test_axes_have_consistent_labels_and_icons(): void
    {
        $this->assertSame('Santé physique', AxeWellBeing::SANTE_PHYSIQUE->label());
        $this->assertSame('bi-heart-pulse', AxeWellBeing::SANTE_PHYSIQUE->icon());
        $this->assertSame('Santé mentale', AxeWellBeing::SANTE_MENTALE->label());
        $this->assertSame('bi-brain', AxeWellBeing::SANTE_MENTALE->icon());
        $this->assertSame('Bien-être social', AxeWellBeing::BIEN_ETRE_SOCIAL->label());
        $this->assertSame('bi-people', AxeWellBeing::BIEN_ETRE_SOCIAL->icon());
        $this->assertSame('Éducation et prévention', AxeWellBeing::EDUCATION_PREVENTION->label());
        $this->assertSame('bi-journal-medical', AxeWellBeing::EDUCATION_PREVENTION->icon());
        $this->assertSame('Développement communautaire', AxeWellBeing::DEVELOPPEMENT_COMMUNAUTAIRE->label());
        $this->assertSame('bi-building', AxeWellBeing::DEVELOPPEMENT_COMMUNAUTAIRE->icon());
    }
}
