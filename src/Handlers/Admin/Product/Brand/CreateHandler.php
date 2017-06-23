<?php
/**
 * This file is part of Notadd.
 *
 * @author TwilRoad <269044570@qq.com>
 * @copyright (c) 2017, notadd.com
 * @datetime 2017-06-21 15:53
 */
namespace Notadd\Mall\Handlers\Admin\Product\Brand;

use Notadd\Foundation\Routing\Abstracts\Handler;
use Notadd\Mall\Models\ProductBrand;

/**
 * Class CreateHandler.
 */
class CreateHandler extends Handler
{
    /**
     * Execute Handler.
     *
     * @throws \Exception
     */
    protected function execute()
    {
        $this->validate($this->request, [
            'category_id' => 'required|numeric',
            'logo'        => 'required',
            'name'        => 'required',
            'order'       => 'numeric',
            'recommend'   => 'numeric',
            'show'        => 'required|in:image,text',
            'store_id'    => 'required|numeric',
        ], [
            'category_id.numeric'  => '分类 ID 必须为数值',
            'category_id.required' => '分类 ID 必须填写',
            'logo.required'        => '品牌 Logo 必须填写',
            'name.required'        => '品牌名称必须填写',
            'order.numeric'        => '排列顺序必须为数值',
            'recommend.numeric'    => '是否推荐为数值',
            'show.in'              => '显示方式值超越限制',
            'show.required'        => '显示方式必须填写',
            'store_id.numeric'     => '店铺 ID 必须为数值',
            'store_id.required'    => '店铺 ID 必须填写',
        ]);
        $this->beginTransaction();
        $data = $this->request->only([
            'category_id',
            'logo',
            'name',
            'order',
            'recommend',
            'show',
            'store_id',
        ]);
        if (ProductBrand::query()->create($data)) {
            $this->commitTransaction();
            $this->withCode(200)->withMessage('申请产品成功！');
        } else {
            $this->rollBackTransaction();
            $this->withError(500)->withError('申请产品失败！');
        }
    }
}