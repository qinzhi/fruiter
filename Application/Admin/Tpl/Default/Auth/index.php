<extend name="Layout/base" />
<block name="header-title">
    <h1>权限管理</h1>
</block>
<block name="content">
    <div class="row">
        <div class="col-lg-12 col-sm-12 col-xs-12">
            <div class="widget">
                <div class="widget-header widget-fruiter">
                    <a class="btn btn-success" id="add" href="javascript:void(0);">添加</a>
                </div><!--Widget Header-->
                <div class="widget-body plugins_goods-">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="well">
                                <table class="table table-bordered table-condensed table-middle flip-content dataTable">
                                    <thead class="flip-content bordered-palegreen">
                                    <tr>
                                        <th width="10%">排序</th>
                                        <th width="40%">模块名称</th>
                                        <th width="40%">地址</th>
                                        <th width="10%">是否有效</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>
                                            <input class="form-control input-sm" type="text" name="sort[]">
                                        </td>
                                        <td>
                                            <i class="fa row-details fa-minus-square-o"></i>
                                            AUSTRALIAN
                                        </td>
                                        <td class="numeric">
                                            $1.38
                                        </td>
                                        <td class="numeric">
                                            -0.01
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input class="form-control input-sm" type="text" name="sort[]">
                                        </td>
                                        <td>
                                            <i class="fa row-details fa-plus-square-o margin-left-20"></i>
                                            AUSTRALIAN
                                        </td>
                                        <td class="numeric">
                                            $1.38
                                        </td>
                                        <td class="numeric">
                                            -0.01
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="well">
                                <input id="id" type="hidden"/>
                                <form class="form-horizontal bv-form form-position" autocomplete="off">
                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">名称*：</label>
                                        <div class="col-lg-8">
                                            <input name="name" value="" class="form-control" type="text" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">排序：</label>
                                        <div class="col-lg-8">
                                            <input name="sort" class="form-control" type="text" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">状态：</label>
                                        <div class="col-lg-8">
                                            <select name="status" class="form-control" autocomplete="off">
                                                <option value="1">启用</option>
                                                <option value="-1">禁用</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback">
                                        <label class="col-lg-4 control-label">简述：</label>
                                        <div class="col-lg-8">
                                        <span class="input-icon icon-right">
                                            <textarea name="remark" class="form-control"  rows="5" autocomplete="off"></textarea>
                                            <i class="fa  fa-rocket darkorange"></i>
                                        </span>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div><!--Widget Body-->
            </div><!--Widget-->
        </div>
    </div>
</block>
<block name="js">
    <script>
        $(function(){
           $('#add').click(function(){

           });
        });
    </script>
</block>