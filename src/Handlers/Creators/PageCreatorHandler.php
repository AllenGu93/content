<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2016, iBenchu.org
 * @datetime 2016-10-08 17:28
 */
namespace Notadd\Content\Handlers\Creators;

use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Translation\Translator;
use Notadd\Content\Models\Page;
use Notadd\Foundation\Passport\Abstracts\SetHandler;

/**
 * Class PageHandler.
 */
class PageCreatorHandler extends SetHandler
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @var \Notadd\Content\Models\Page
     */
    protected $page;

    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * PageCreatorHandler constructor.
     *
     * @param \Illuminate\Container\Container    $container
     * @param \Notadd\Content\Models\Page        $page
     * @param \Illuminate\Http\Request           $request
     * @param \Illuminate\Translation\Translator $translator
     */
    public function __construct(Container $container, Page $page, Request $request, Translator $translator)
    {
        parent::__construct($container, $request, $translator);
        $this->page = $page;
        $this->request = $request;
    }

    /**
     * @return int
     */
    public function code()
    {
        return 200;
    }

    /**
     * @return array
     */
    public function errors()
    {
        return [
            $this->translator->trans(''),
        ];
    }

    /**
     * @return bool
     */
    public function execute()
    {
        $this->id = $this->page->create($this->request->all());

        return true;
    }

    /**
     * @return array
     */
    public function messages()
    {
        return [
            $this->translator->trans(''),
        ];
    }
}