@extends('layouts.base')
@section('content')
<div class="layui-container fly-marginTop fly-user-main">
  @include('user.nav')
  <div class="fly-panel fly-panel-user" pad20="">
    <div class="layui-tab layui-tab-brief" lay-filter="user">
      <ul class="layui-tab-title">
        <li class="layui-this"><a href="/user/product/">我的产品</a></li>
      </ul>
      <div class="layui-form layui-tab-content" id="LAY_ucm" style="padding: 5px 0;">
        <div class="layui-tab-item layui-show">
          <form action="" class="layui-form">
            <div class="layui-form-item" style="margin: 10px 0 0;"><label class="layui-form-label"
                                                                          style="width: auto; padding-right: 5px;">别名筛选：</label>
              <div class="layui-input-inline"><input type="text" name="alias" class="layui-input" value=""></div>
              <button type="submit" class="layui-btn">搜索</button>
            </div>
          </form>
          <table id="LAY_productList"></table>
          <div class="layui-form layui-border-box layui-table-view" lay-filter="LAY-table-2" style=" ">
            <div class="layui-table-box">
              <div class="layui-table-header">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                  <thead>
                  <tr>
                    <th data-field="0" data-minwidth="300">
                      <div class="layui-table-cell laytable-cell-2-0"><span>产品名称</span></div>
                    </th>
                    <th data-field="authProduct">
                      <div class="layui-table-cell laytable-cell-2-authProduct"><span>别名</span></div>
                    </th>
                    <th data-field="2">
                      <div class="layui-table-cell laytable-cell-2-2"><span>属性</span></div>
                    </th>
                    <th data-field="expiry_time">
                      <div class="layui-table-cell laytable-cell-2-expiry_time"><span>授权有效期</span></div>
                    </th>
                    <th data-field="price">
                      <div class="layui-table-cell laytable-cell-2-price"><span>付费金额</span></div>
                    </th>
                    <th data-field="5">
                      <div class="layui-table-cell laytable-cell-2-5"><span>操作</span></div>
                    </th>
                  </tr>
                  </thead>
                </table>
              </div>
              <div class="layui-table-body layui-table-main">
                <table cellspacing="0" cellpadding="0" border="0" class="layui-table">
                  <tbody></tbody>
                </table>
                <div class="layui-none">您还没有任何产品授权（推荐：<a href="http://layim.layui.com/#getAuth" target="_blank"
                                                         class="fly-link">layim</a>）
                </div>
              </div>
            </div>
            <div class="layui-table-page layui-hide" style="">
              <div id="layui-table-page2"></div>
            </div>
            <style>.laytable-cell-2-0{
                width:318px;
              }

              .laytable-cell-2-authProduct{
                width:100px;
              }

              .laytable-cell-2-2{
                width:150px;
              }

              .laytable-cell-2-expiry_time{
                width:120px;
              }

              .laytable-cell-2-price{
                width:120px;
              }

              .laytable-cell-2-5{
                width:100px;
              }</style>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection