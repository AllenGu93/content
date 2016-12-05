<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2016, iBenchu.org
 * @datetime 2016-11-25 15:16
 */
namespace Notadd\Content\Handlers\Deleters;

use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Translation\Translator;
use Notadd\Content\Models\CategoryTemplate;
use Notadd\Foundation\Passport\Abstracts\SetHandler;

/**
 * Class CategoryTemplateDeleteHandler.
 */
class CategoryTemplateDeleterHandler extends SetHandler
{
    /**
     * @var \Notadd\Content\Models\CategoryTemplate
     */
    protected $categoryTemplate;

    /**
     * CategoryTemplateDeleterHandler constructor.
     *
     * @param \Notadd\Content\Models\CategoryTemplate $categoryTemplate
     * @param \Illuminate\Container\Container         $container
     * @param \Illuminate\Http\Request                $request
     * @param \Illuminate\Translation\Translator      $translator
     */
    public function __construct(
        CategoryTemplate $categoryTemplate,
        Container $container,
        Request $request,
        Translator $translator
    ) {
        parent::__construct($container, $request, $translator);
        $this->categoryTemplate = $categoryTemplate;
    }

    /**
     * TODO: Method code Description
     *
     * @return int
     */
    public function code()
    {
        return 200;
    }

    /**
     * TODO: Method errors Description
     *
     * @return array
     */
    public function errors()
    {
        return [
            $this->translator->trans(''),
        ];
    }

    /**
     * Execute Handler.
     *
     * @return bool
     */
    public function execute()
    {
        $categoryTemplate = $this->categoryTemplate->newQuery()->find($this->request->input('id'));
        if ($categoryTemplate === null) {
            return false;
        }
        $categoryTemplate->delete();

        return true;
    }

    /**
     * TODO: Method messages Description
     *
     * @return array
     */
    public function messages()
    {
        return [
            $this->translator->trans(''),
        ];
    }
}
