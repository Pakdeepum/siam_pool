<!-- Modal Add -->
<form action="{{route('BackendProduct.AddProduct')}}" method="post" id="addproduct" enctype="multipart/form-data" class="form-horizontal" role="form">
{{csrf_field()}}
  <!-- Modal -->
        <div class="modal" tabindex="-1" role="dialog" id="modal-AddProduct">
            <div class="modal-dialog modal-lg" role="document">
              <div class="col">
                <div class="modal-content modal-pos">
                    <div class="alert alert-danger" style="display:none"></div>
                <div class="modal-header">
                    <h5 class="modal-title">ADD Product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="row"> -->
                        <div class="col-md-12">
                            <div class="block">
                                    <div class ="row">
                                        <div class = "col-md-12">
                                            <div class="col-md-2"></div>
                                            <div class="col-md-4">
                                                <div id="file1-valid">Choose File</div>
                                                <input type="file" class="file" name="file1" id="file1" title="Browse file" style="width: 100%;" required />
                                                <div id="preview-product1" class="cropped-product"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="file" class="file" name="file2" id="file2" title="Browse file" style="width: 100%;" />
                                                <div id="preview-product2" class="cropped-product"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="file" class="file" name="file3" id="file3" title="Browse file" style="width: 100%;" />
                                                <div id="preview-product3" class="cropped-product"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="file" class="file" name="file4" id="file4" title="Browse file" style="width: 100%;"/>
                                                <div id="preview-product4" class="cropped-product"></div>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="file" class="file" name="file5" id="file5" title="Browse file" style="width: 100%;"/>
                                                <div id="preview-product5" class="cropped-product"></div>
                                            </div>
                                            <div class="col-md-2"></div>
                                        </div>
                                    </div>
                                    <p style="color:red;">*Image size 360x360</p>
                                    <p style="color:red;">*Please Add Image 5 Image (jpg,png)</p>
                                    <br/>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label align="right" class="col-md-4 control-label">ProductName</label>
                                                <div class="col-md-6">
                                                    <input id="productname"  name="productname" type="text" class="form-control" placeholder="Please enter product name" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label align="right" class="col-md-4 control-label">Product Detail</label>
                                                <div class="col-md-6">
                                                    <textarea id="product_detail_a"  name="product_detail" class="form-control" placeholder="Please enter product detail" required ></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label align="right" class="col-md-4 control-label">Product Warning</label>
                                                <div class="col-md-6">
                                                    <input id="product_warning"  name="product_warning" type="text" class="form-control" placeholder="Please enter product warning" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label align="right" class="col-md-4 control-label">Product Instruction</label>
                                                <div class="col-md-6">
                                                    <input id = "product_instruction"  name="product_instruction" type="text" class="form-control" placeholder="Please enter product instruction" required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label align="right" class="col-md-4 control-label">Category Product</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" id="idproducttype" name="idproducttype"  required>
                                                        <option value="" hidden>Select Category</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label align="right" class="col-md-4 control-label">Brand</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" id="idBrandProduct" name="idBrandProduct"  required>
                                                        <option value="" hidden>Select Brand</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label align="right" class="col-md-4 control-label">Product Price</label>
                                                <div class="col-md-5">
                                                    <input id ="productprice"  name="productprice" type="number" min="1" value="1" onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" class="form-control" placeholder="Please enter product price" min="0" max="999999999" required/>
                                                </div>
                                                <div class="col-md-2">
                                                <label class="col-md-4 control-label">฿</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label align="right" class="col-md-4 control-label">Product Code</label>
                                                <div class="col-md-6">
                                                    <input id = "productcode"  name="productcode" type="text" class="form-control" placeholder="Please enter product code"  required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label align="right" class="col-md-4 control-label">Stock Amount</label>
                                                <div class="col-md-6">
                                                    <input id = "stock_amount"  name="stock_amount" type="number" min="0" value="1"  onkeypress="return (event.charCode == 8 || event.charCode == 0 || event.charCode == 13) ? null : event.charCode >= 48 && event.charCode <= 57" class="form-control" placeholder="Please fill amount of product"  required/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label align="right" class="col-md-4 control-label">Promotion</label>
                                                <div class="col-md-6">
                                                    <select class="form-control" id="promotion" name="promotion">
                                                        <option value="">please select ...</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    <!-- </div> -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success" id="submitFile" >Save</button>
                    </div>
                </div>
              </div>
            </div>
        </div>
  </form>
