<?php

namespace Runroom\StaticPageBundle\Tests\Unit;

use Runroom\StaticPageBundle\Entity\StaticPage;
use Runroom\StaticPageBundle\Service\StaticPageService;

class StaticPageServiceTest extends \PHPUnit_Framework_TestCase
{
    const STATIC_SLUG = 'slug';

    public function setUp()
    {
        $this->repository = $this->prophesize('Runroom\StaticPageBundle\Repository\StaticPageRepository');

        $this->service = new StaticPageService(
            $this->repository->reveal()
        );
    }

    /**
     * @test
     */
    public function itGetsStaticViewModel()
    {
        $static = new StaticPage();

        $this->repository->findStaticPage(self::STATIC_SLUG)
            ->willReturn($static);

        $model = $this->service->getStaticPageViewModel(self::STATIC_SLUG);

        $this->assertInstanceOf('Runroom\StaticPageBundle\ViewModel\StaticPageViewModel', $model);
        $this->assertSame($static, $model->getStaticPage());
    }
}