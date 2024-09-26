@extends('LayOut.admin-dashboard.master_admin')
@section('content')
    <section class="content-header">
        <h1>
            Add Event
            <small>Create</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href=""><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="">Events</a></li>
            <li class="active">Add Event</li>
        </ol>
    </section>
    <section class="content">
        {{-- @comment --}}
        {{-- @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row"> --}}
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add New Event</h3>
                    </div>
                    <div class="box-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="content">Event Content:</label>
                                <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="fileInput">Image<span class="text-danger">(*)</span></label>
                                <input type="file" class="form-control-file" id="fileInput" name="image"
                                       required>
                                
                                
                            </div>
                            <div class="form-group">
                                <label for="linkevent">Event Link</label>
                                <input type="url" name="linkevent" class="form-control" id="linkevent" value="{{ old('linkevent') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="checkactive">Active</label>
                                <select name="checkactive" id="checkactive" class="form-control" required>
                                    <option value="1" {{ old('checkactive') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('checkactive') == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_date" class="form-control" id="start_date" value="{{ old('start_date') }}" required>
                            </div>
                            <div class="form-group">
                                <label for="end_date">End Date</label>
                                <input type="date" name="end_date" class="form-control" id="end_date" value="{{ old('end_date') }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
