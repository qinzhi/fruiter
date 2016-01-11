<table class="table-form">
    <colgroup>
        <col width="150px">
        <col>
    </colgroup>
    <tbody>
        <tr>
            <th>商品名称：</th>
            <td><input id="name" name="name" class="input-sm Lwidth400" type="text"></td>
        </tr>
        <tr>
            <th>关键字：</th>
            <td>
                <input id="keyword" name="keyword"  type="text" class="input-sm Lwidth300"/>
                <span class="note margin-10">每个关键词最长为15个字符，必须以","(逗号)分隔符</span>
            </td>
        </tr>
        <tr>
            <th>所属分类：</th>
            <td>
                <input id="product_category" name="product_category" class="input-sm Lwidth400" type="text">
                <input id="product_category_id" name="product_category_id" class="hidden" type="text">
            </td>
        </tr>
        <tr>
            <th>是否上架：</th>
            <td>
                <span class="control-group">
                    <div class="radio line-radio">
                        <label class="no-padding">
                            <input name="form-field-radio" type="radio" checked="checked">
                            <span class="text">下架</span>
                        </label>
                    </div>
                    <div class="radio line-radio">
                        <label>
                            <input name="form-field-radio" type="radio">
                            <span class="text">上架</span>
                        </label>
                    </div>
                </span>
            </td>
        </tr>
        <tr>
            <th>商品类型：</th>
            <td>
                <div class="checkbox checkbox-inline no-margin no-padding">
                    <label style="padding: 0">
                        <input type="checkbox" checked="checked">
                        <span class="text">最新商品</span>
                    </label>
                </div>
                <div class="checkbox checkbox-inline no-margin">
                    <label>
                        <input type="checkbox" checked="checked">
                        <span class="text">特价商品</span>
                    </label>
                </div>
                <div class="checkbox checkbox-inline no-margin">
                    <label>
                        <input type="checkbox" checked="checked">
                        <span class="text">热卖商品</span>
                    </label>
                </div>
                <div class="checkbox checkbox-inline no-margin">
                    <label>
                        <input type="checkbox" checked="checked">
                        <span class="text">推荐商品</span>
                    </label>
                </div>
            </td>
        </tr>
    </tbody>
</table>