<?php

namespace App\DataFixtures;

use App\Entity\CmsPage;
use App\Entity\CmsPageTranslation;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

        $faker = \Faker\Factory::create();

        $cmsPage = new CmsPage();
        $cmsPage->setCreatedAt(new \DateTime());

        $cmsPageTranslationFr = (new CmsPageTranslation())
            ->setLocale('fr')
            ->setSlug('qui-nous-sommes')
            ->setTitle('Qui sommes  nous');

        $cmsPageTranslationEn = (new CmsPageTranslation())
            ->setLocale('en')
            ->setSlug('who-we-are')
            ->setTitle('Who we are');

        $cmsPage->addTranslation($cmsPageTranslationEn);
        $cmsPage->addTranslation($cmsPageTranslationFr);

        $manager->persist($cmsPage);

        $cmsPage = new CmsPage();
        $cmsPage->setCreatedAt(new \DateTime());

        $cmsPageTranslationFr = (new CmsPageTranslation())
            ->setLocale('fr')
            ->setSlug('contactez-nous')
            ->setTitle('Contactez  nous');

        $cmsPageTranslationEn = (new CmsPageTranslation())
            ->setLocale('en')
            ->setSlug('contact-us')
            ->setTitle('Contact us');

        $cmsPage->addTranslation($cmsPageTranslationEn);
        $cmsPage->addTranslation($cmsPageTranslationFr);

        $manager->persist($cmsPage);
        $manager->flush();
    }
}
