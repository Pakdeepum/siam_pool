<!-- Modal Add -->
<form  method="post" enctype="multipart/form-data" class="form-horizontal" role="form">
    {{csrf_field()}}
<!-- Modal -->
  <!-- hide responsive -->
  <div class="modal" tabindex="-1" role="dialog" id="modal-cart" data-backdrop="false">
      <div class="modal-lg" role="document">
          <div class="modal-content">
              <div class="alert alert-danger" style="display:none"></div>
          <div class="modal-header">
              <h5 class="top_head_txt"style="padding-top: 13px;">{{ trans('product.card_item') }}</h5>
              <button type="button" class="btn btn-danger btnclose" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">{{ trans('product.close') }}</span>
              </button>
          </div>
          <div class="modal-body">
              <div class="table-responsive">
                  <table id="cart-table" class="table-no-bordered" data-pagination="false"
                  data-page-size="4" data-toggle="table">
                      <thead class="text-primary">
                      <tr>
                          <th data-formatter="cartRemoveFormatter" data-align="center" data-halign="center"></th>
                          <th data-field="image" data-width="100px" data-formatter="cartImageFormatter" data-align="center" data-halign="center"></th>
                          <th data-field="productName" class="blodth" data-align="left" data-halign="center" ></th>
                          <th data-field="operateDelete" data-formatter="operateDeleteFormatter" data-align="center" data-events="operateEvents" data-width="100"></th>
                          <th data-field="Amount" data-align="right" class="blodth" data-sortable="true" data-align="center" data-halign="center">{{ trans('product.total') }}</th>
                          <th data-field="operateAdd" data-formatter="operateAddFormatter" data-align="left" data-events="operateEvents" data-width="100"></th>
                          <th data-field="price" data-align="right" data-sortable="true"  data-halign="center">{{ trans('product.price') }}</th>
                          <th data-field="totalPrice" data-formatter="totalPriceFormatter" data-align="right" data-sortable="true"  data-halign="center">{{ trans('product.total_price') }}</th>
                      </tr>
                      </thead>
                  </table>
              </div>
              <div class="row">
                  <div class="col">
                      <span>{{ trans('product.Product_Summary') }}</span> <span id="totalList"></span>   {{ trans('product.list') }}
                       <span id="totalAmount"></span>  {{ trans('product.item') }}
                  </div>
                  <div class="col">
                      <div class="cart-right">
                          <span>{{ trans('product.total_price') }}</span> <span class="top_head_txt" id="totalPrices"></span>  {{ trans('product.Bath') }}
                      </div>
                  </div>
              </div>
          </div>
          <div class="modal-footer">
              <!-- <a href="javascript:void(0);" type="submit" class="btn buy_btn" id="cart-accept">ชำระเงิน</a> -->
              {{-- <a href="/v1/payment"class="btn btn-success">Checkouts</a> --}}
              <a href="/product"class="btn btn-success">{{ trans('product.Continue_Shoping') }}</a>
              <a href="javascript:void(0);"class="btn btn-primary" id="cart-accept">{{ trans('product.Checkouts') }}</a>
          </div>
          </div>
      </div>
  </div>
</form>
