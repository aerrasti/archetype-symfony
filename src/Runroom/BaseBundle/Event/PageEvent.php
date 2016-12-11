<?php

namespace Runroom\BaseBundle\Event;

use Runroom\BaseBundle\ViewModel\PageViewModel;
use Symfony\Component\EventDispatcher\Event;

class PageEvent extends Event
{
    protected $page;

    public function __construct($model)
    {
        $this->page = new PageViewModel();
        $this->page->setContent($model);
    }

    public function getPage()
    {
        return $this->page;
    }

    public function setPage(PageViewModel $page)
    {
        $this->page = $page;
    }
}