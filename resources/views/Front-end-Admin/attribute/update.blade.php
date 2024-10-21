
  <section class="content">
    <div class="row">
    <div class="box box-primary">
        {{-- <form action="{{ route('updateattribute',$attribute->id_attribute) }}" method="POST"> --}}
        <form action=""form-edit id="" method="POST">
            @csrf
            <div class="box-body">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="name">Name <span class="text-danger">(*)</span></label>
                        <input type="text" class="form-control" name="attributename" value="{{ $attribute->name }}" placeholder="Name ......">
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="form-group">
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" name="attributedescription" rows="3"  placeholder="Enter ..."></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer" >
                <a href="" class="btn btn-danger"><i class="fa fa-undo"></i> Trở Lại</a>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Submit</button>
            </div>
            </div>
        </form>
    </div>
    </div>
  </section>
