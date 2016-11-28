<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2016, iBenchu.org
 * @datetime 2016-10-08 17:27
 */
namespace Notadd\Content\Handlers\Creators;

use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Translation\Translator;
use Notadd\Content\Models\Category;
use Notadd\Foundation\Passport\Abstracts\SetHandler;

/**
 * Class CategoryHandler.
 */
class CategoryCreatorHandler extends SetHandler
{
    /**
     * @var \Notadd\Content\Models\Category
     */
    protected $category;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * CategoryCreatorHandler constructor.
     *
     * @param \Notadd\Content\Models\Category    $category
     * @param \Illuminate\Container\Container    $container
     * @param \Illuminate\Http\Request           $request
     * @param \Illuminate\Translation\Translator $translator
     */
    public function __construct(Category $category, Container $container, Request $request, Translator $translator)
    {
        parent::__construct($container, $request, $translator);
        $this->category = $category;
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
    public function data()
    {
        return [
            'id' => $this->id,
        ];
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
        $this->id = $this->category->create($this->request->all());

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