@extends('LayOut.admin-dashboard.master_admin')
@section('content')
<section class="content-header">
    <h1>
      Attribute
      <small>index</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="">Attribute</a></li>
      <li class="active">list</li>

    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Small boxes (Stat box) -->
    {{-- @comment --}}
    {{-- @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
     @endif --}}
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title"><a href="" class="btn btn-primary">Thêm mới </a></h3>
                <div class="box-tools">
                  <form action="#">
                  <div class="input-group input-group-sm" style="width: 150px;">
                    <input type="text" name="key" value="{{ request()->input('key') }}" class="form-control pull-right" placeholder="Search">
                    <div class="input-group-btn">
                      <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                    </div>
                  </div>
                  </form>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body table-responsive no-padding">
                <table class="table table-hover">
                  <tbody>
                    <tr>
                      <th>STT</th>
                      <th>Name</th>
                      <th>Description</th>
                      <th>CheckActive</th>
                      <th>Time</th>
                      <th>Action</th>
                    </tr>
                  {{-- @comment --}}
                    {{-- @if($attribute->total() > 0)
                    @php
                    $count = 0;
                  @endphp
                  @if(isset($attribute))
                      @foreach ($attribute as $item)
                      @php
                      $count ++;
                    @endphp --}}
                          <tr>
                              <td>haha</td>

                              <td></td>
                              {{-- <td><span class="{{ $item->getType($item->atb_type)['class'] }}"></span></td> --}}
                              <td></td>
                              {{-- @comment --}}
                              {{-- <td>
                                @if ($item->checkactive == 1)
                                <a href="{{ route('toggleattribute',['id'=>$item->id_attribute]) }}" class="label label-info status-active">Show</a>
                                @else
                                 <a href="{{ route('toggleattribute',['id'=>$item->id_attribute]) }}" class="label label-default status-active">Hide</a>
                                 @endif
                                </td> --}}
                              <td></td>
                              <td>
                                  <a href="" class="btn btn-xs btn-primary" onclick="return confirm('Bạn chắc chắn là sửa chứ')"><i class="fa fa-pencil"></i> Edit</a>
                                  <a  href=""  class="btn btn-xs btn-danger js-delete-confirm" onclick="return confirm('Bạn chắc chắn là xoá chứ')"><i class="fa fa-trash"></i> Delete</a>
                              </td>
                          </tr>
                          {{-- @comment --}}
                      {{-- @endforeach
                  @endif
                    @else
                     <h3>Rất tiêc, dữ liệu không tìm thấy</h3>
                    @endif --}}

                  </tbody>
                </table>
                  <!-- Phân trang bắt đầu -->
                  <div id="pageNavPosition" class="text-right">
                      <ul class="pagination">
                        {{-- @comment --}}
                          {{-- @if ($attribute->onFirstPage())
                              <li class="disabled"><span>&laquo;</span></li>
                          @else
                              <li><a href="{{ $attribute->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                          @endif

                          @for ($i = 1; $i <= $attribute->lastPage(); $i++)
                              <li class="{{ $i == $attribute->currentPage() ? 'active' : '' }}">
                                  <a href="{{ $attribute->url($i) }}">{{ $i }}</a>
                              </li>
                          @endfor

                          @if ($attribute->hasMorePages())
                              <li><a href="{{ $attribute->nextPageUrl() }}" rel="next">&raquo;</a></li>
                          @else
                              <li class="disabled"><span>&raquo;</span></li>
                          @endif --}}
                      </ul>
                  </div>
                  <!-- Phân trang kết thúc -->
              </div>
              <!-- /.box-body -->
              {{--  {!! $attribute->links() !!}  --}}
              <div></div>
            </div>
            <!-- /.box -->
          </div>
    </div>
    <!-- /.row -->
    <!-- Main row -->
    <!-- /.row (main row) -->
  </section>
  <!-- /.content -->
@endsection
