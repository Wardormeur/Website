<?php

namespace CoderDojo\WebsiteBundle\DataFixtures\ORM;

use CoderDojo\WebsiteBundle\Entity\Category;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Ramsey\Uuid\Uuid;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * @codeCoverageIgnore
 */
class LoadCategoryData extends AbstractFixture implements FixtureInterface, ContainerAwareInterface, OrderedFixtureInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    /**
     * {@inheritDoc}
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * {@inheritDoc}
     */
    public function load(ObjectManager $manager)
    {
        $categories = [
            [
                'title' => 'Wereldwijd',
                'reference' => 'category_1'
            ],
            [
                'title' => 'Organisatie',
                'reference' => 'category_2'
            ],
            [
                'title' => 'Promotie',
                'reference' => 'category_3'
            ],
            [
                'title' => 'Materiaal',
                'reference' => 'category_4'
            ],
            [
                'title' => 'Verhalen',
                'reference' => 'category_5'
            ]
        ];

        foreach ($categories as $category) {
            $entity = new Category(
                (string) Uuid::uuid4(),
                $category['title']
            );

            $this->setReference($category['reference'], $entity);
            $manager->persist($entity);
        }

        $manager->flush();
    }

    /**
     * {@inheritDoc}
     */
    public function getOrder()
    {
        return 2; // the order in which fixtures will be loaded
    }
}
