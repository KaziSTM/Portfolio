<?php

namespace App\Actions\Cms\Home;

use App\Actions\Cms\Home\Sections\GetCompaniesSection;
use App\Actions\Cms\Home\Sections\GetFeaturesSection;
use App\Actions\Cms\Home\Sections\GetHeroSection;
use App\Actions\Cms\Home\Sections\GetWorkSection;

class GetHomePageSections
{
    public function __construct(

        protected GetHeroSection $heroSectionData,
        protected GetFeaturesSection $featuresSectionData,
        protected GetWorkSection $workSectionData,
        protected GetCompaniesSection $companiesSectionData,
    ) {}

    public function __invoke(): array
    {
        return [
            'heroSection' => ($this->heroSectionData)(),
            'featuresSection' => ($this->featuresSectionData)(),
            'toolsSectionCaption' => __('ui.home.tools_caption'),
            'latestWorkSection' => ($this->workSectionData)(),
            'companiesSection' => ($this->companiesSectionData)(),
        ];
    }
}
