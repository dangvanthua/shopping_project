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
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Add New Event</h3>
                    </div>
                    <div class="box-body">
                    @if(isset($event))
                    @php
                        $id_event = $event->id_event;

                        $secretKey = env('SECRET_KEY', 'secret_key');

                        $combined = $id_event . ':' . $secretKey;

                        $encodedId = base64_encode($combined);
                    @endphp
                    @endif
                       <form action="{{ isset($event) ? route('events.update', ['id' => $encodedId]) : route('events.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @if(isset($event))
                                @method('PUT')
                            @endif

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $event->name ?? '') }}" required>
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="content">Event Content:</label>
                                <textarea name="content" id="content" class="form-control" rows="5" required>{{ old('content', $event->content ?? '') }}</textarea>
                                @error('content')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="fileInput">Image<span class="text-danger">(*)</span></label>
                                <input type="file" class="form-control-file" id="fileInput" name="image">
                                @if(isset($event) && $event->image)
                                    <img src="{{ asset('images/events/' . $event->image) }}" alt="{{ $event->name }}" width="100">
                                @endif
                                @error('image')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="check_active">Active</label>
                                <select name="check_active" id="check_active" class="form-control" required>
                                    <option value="1" {{ old('check_active', $event->check_active ?? '') == '1' ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ old('check_active', $event->check_active ?? '') == '0' ? 'selected' : '' }}>Inactive</option>
                                </select>
                                @error('check_active')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="start_date">Start Date</label>
                                <input type="date" name="start_day" class="form-control" id="start_day" 
                                value="{{ old('start_day', isset($event->start_day) ? \Carbon\Carbon::parse($event->start_day)->format('Y-m-d') : '') }}" required>
                                @error('start_day')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="end_date">End Date</label>
                              <input type="date" name="end_day" class="form-control" id="end_day" 
                                value="{{ old('end_day', isset($event->end_day) ? \Carbon\Carbon::parse($event->end_day)->format('Y-m-d') : '') }}" required>
                                 @error('end_day')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">{{ isset($event) ? 'Update' : 'Submit' }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
