

<table class="table table-hover">
    <tbody>
        <tr>
            <th>ID -- STT</th>
            <th>Name SP</th>
            <th>User Name</th>
            <th>Star</th>
            <th>Rating</th>
            <th>Time</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @if(isset($ratings))
            @php
                $i = 0;
            @endphp
            @foreach ($ratings as $item)
                <tr>
                    <td></td>
                    <td><a href="{{ route('get.product.detail',$item->product->pro_slug.'-'.$item->product->id) }}" target="_blank">{{ $item->product->pro_name ?? "[N\A]" }}</a></td>
                    <td></td>
                    <td>
                        <div class="ratings">
                            {{-- @comment --}}
                            {{-- @for($i = 1 ; $i <= 5 ; $i++)
                                <span class="{{ $i <= $item->r_number ? 'active' : '' }}"><i class="fa fa-star"></i></span>
                            @endfor --}}
                        </div>

                    </td>
                    <td></td>
                    <td></td>
                    <td>
                        {{-- @comment --}}
                        {{-- @if ($item->r_status==1)
                            <a href="{{ request()->fullUrlWithQuery(['r_status'=>1, 'r_id' => $item->id]) }}" data-id="{{ $item->id }}" class="label label-info status-actives">Active</a>
                        @else
                                <a href="{{ request()->fullUrlWithQuery(['r_status'=>2, 'r_id' => $item->id]) }}" data-id="{{ $item->id }}" class="label label-default status-actives">Hide</a>
                        @endif --}}
                    </td>
                    <td>
                        <a href=""
                            class="btn btn-xs btn-info js-preview-rating"><i class="fa fa-eye"></i>View</a>

                        <a href="" class="btn btn-xs btn-danger js-delete-confirm"><i class="fa fa-trash"></i> Delete</a>
                    </td>
                </tr>
            @endforeach
        @endif
    </tbody>
</table>
{{-- <div>{!! $ratings->appends($query ?? [])->links() !!}</div> --}}
