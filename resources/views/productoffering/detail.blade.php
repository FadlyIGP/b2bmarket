 {!! Form::open(['url'=>url('/offeringproducts',$listdata['id']),'method'=>'PUT','files'=>'true','class'=>'form-horizontal','autocomplete'=>'off'])!!}
 <div class="form-group" id="rata">
    <label class="col-sm-3 control-label">Price Quotation</label>
    <div class="col-sm-9">
        {{-- <input type="text" name="id"  value="{{}}"> --}}
      <input type="text" class="form-control" name="price_quotation" value="{{$listdata['price_quotation']}}" placeholder="Ajukan Harga" id="price_quotation" required>
  </div>
</div>

</div>

<!-- Modal footer -->
<div class="modal-footer">
  <div class="form-group">
   <a href="{{url('/approved',$listdata['id'])}}" id="modal1" class="btn btn-xs btn-info" data-toggle="modal" data-id="{{ $listdata['id'] }}" title="approved" style="background-color:#fb8c00;border-radius:5px;width:80px;color: white;height: 30px">
     <span>Approved</span>
 </a>
    {{ Form::submit('Submit',['class'=>'btn btn-default','style'=>'background-color:#fb8c00;border-radius:5px;width:80px;color: white;'])}}
</div>
{{ Form::close()}}


