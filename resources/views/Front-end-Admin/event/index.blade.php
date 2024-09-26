@extends('LayOut.admin-dashboard.master_admin')
@section('content')
    <section class="content-header">
        <h1>
            Events
            <small>index</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href=""> Events</a></li>
            <li class="active">list</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
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
                                <th>Content</th>
                                <th>Image</th>
                                <th>Link Event</th>
                                <th>Check Active</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                            {{-- @comment --}}
                            {{-- @if($events->total() > 0)
                                @php
                                    $count = 0;
                                @endphp
                                @foreach ($events as $event)
                                    @php
                                        $count++;
                                    @endphp
                                    <tr>
                                        <td>{{ $count }}</td>
                                        <td>{{ $event->name }}</td>
                                        <td>{{ $event->content }}</td>
                                        <td>
                                            @if($event->image)
                                                <img src="{{ asset( $event->image) }}" alt="{{ $event->name }}" width="100">
                                            @else
                                                No image
                                            @endif
                                        </td>
                                        <td><a href="{{ $event->linkevent }}">{{ $event->linkevent }}</a></td>
                                        <td>{{ $event->checkactive ? 'Active' : 'Inactive' }}</td>
                                        <td>{{ $event->start_date }}</td>
                                        <td>{{ $event->end_date }}</td>
                                        <td>{{ $event->created_at }}</td>
                                        <td>{{ $event->updated_at }}</td>
                                        <td>
                                            <a href="#" class="btn btn-xs btn-primary" onclick="return confirm('Bạn chắc chắn là sửa chứ?')"><i class="fa fa-pencil"></i> Edit</a>
                                            <a href="{{ route('deleteEvent', ['id' => $event->id_event]) }}" class="btn btn-xs btn-danger js-delete-confirm" onclick="return confirm('Bạn chắc chắn là xoá chứ?')"><i class="fa fa-trash"></i> Delete</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="11" class="text-center">Rất tiếc, không có dữ liệu</td>
                                </tr>
                            @endif --}}

                            </tbody>
                        </table>

                    </div>
{{--                    <!-- /.box-body -->--}}
{{--                    <div>{{ $events->links() }}</div>--}}
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- Phân trang bắt đầu -->
        <div id="pageNavPosition" class="text-right">
            <ul class="pagination">
                {{-- @comment --}}

                {{-- @if ($events->onFirstPage())
                    <li class="disabled"><span>&laquo;</span></li>
                @else
                    <li><a href="{{ $events->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                @endif

                @for ($i = 1; $i <= $events->lastPage(); $i++)
                    <li class="{{ $i == $events->currentPage() ? 'active' : '' }}">
                        <a href="{{ $events->url($i) }}">{{ $i }}</a>
                    </li>
                @endfor

                @if ($events->hasMorePages())
                    <li><a href="{{ $events->nextPageUrl() }}" rel="next">&raquo;</a></li>
                @else
                    <li class="disabled"><span>&raquo;</span></li>
                @endif --}}
            </ul>
        </div>
        <!-- Phân trang kết thúc -->
    </section>
    <!-- /.content -->
@endsection
