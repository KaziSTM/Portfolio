<?php

namespace App\Actions\Cms\About;

use App\Actions\Cms\About\Sections\GetCareerSection;
use App\Actions\Cms\About\Sections\GetIntroSection;
use App\Actions\Cms\About\Sections\GetStackSection;

class GetAboutPageSections
{
    public function __construct(
        protected GetIntroSection $introSectionData,
        protected GetCareerSection $careerSectionData,
        protected GetStackSection $stackSectionData,
    ) {}

    public function __invoke(): array
    {
        return [
            'intro' => ($this->introSectionData)(),
            'careers' => ($this->careerSectionData)(),
            'stack' => ($this->stackSectionData)(),
        ];
    }
}
