<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(10);

        return view('Front-end-Admin.event.index', compact('events'));
    }

    public function create()
    {
        return view('Front-end-Admin.event.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
                'unique:event,name',
                'regex:/^(?!.*\s{2,}).+$/',
            ],
            'content' => [
                'required',
                'string',
                'regex:/^(?!.*\s{2,}).+$/',
            ],
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'check_active' => 'required|boolean',
            'start_day' => 'required|date',
            'end_day' => 'required|date|after_or_equal:start_day',
        ], [
            // Custom messages
            'name.required' => 'Tên sự kiện là bắt buộc.',
            'name.unique' => 'Tên sự kiện đã tồn tại.',
            'name.regex' => 'Tên sự kiện không được phép có hai khoảng trắng liên tiếp.',
            'content.required' => 'Nội dung sự kiện là bắt buộc.',
            'content.regex' => 'Nội dung không được phép có hai khoảng trắng liên tiếp.',
            'image.required' => 'Hình ảnh là bắt buộc.',
            'image.image' => 'File phải là một hình ảnh.',
            'image.mimes' => 'Hình ảnh phải có định dạng jpeg, png, jpg, hoặc gif.',
            'image.max' => 'Hình ảnh không được lớn hơn 2MB.',
            'check_active.required' => 'Trạng thái kích hoạt là bắt buộc.',
            'start_day.required' => 'Ngày bắt đầu là bắt buộc.',
            'start_day.date' => 'Ngày bắt đầu không đúng định dạng.',
            'end_day.required' => 'Ngày kết thúc là bắt buộc.',
            'end_day.date' => 'Ngày kết thúc không đúng định dạng.',
            'end_day.after_or_equal' => 'Ngày kết thúc phải sau hoặc bằng ngày bắt đầu.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/events'), $imageName);
        } else {
            return redirect()->back()->withErrors('Image upload failed');
        }

        Event::create([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'image' => $imageName ?? null,
            'check_active' => $request->input('check_active'),
            'start_day' => $request->input('start_day'),
            'end_day' => $request->input('end_day'),
        ]);

        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    public function edit($encodedId)
    {

        $decoded = base64_decode($encodedId);


        list($id_event, $secretKey) = explode(':', $decoded);

        if ($secretKey !== env('SECRET_KEY', 'secret_key')) {
            abort(403, 'Unauthorized action.');
        }

        $event = Event::where('id_event', $id_event)->firstOrFail();

        // Return the create view with the event data
        return view('Front-end-Admin.event.create', compact('event'));
    }

    public function update(Request $request, $encodedId)
    {
        $decoded = base64_decode($encodedId);

        list($id_event, $secretKey) = explode(':', $decoded);

        if ($secretKey !== env('SECRET_KEY', 'secret_key')) {
            abort(403, 'Unauthorized action.');
        }

        $validator = Validator::make($request->all(), [
            'name' => [
                'required',
                'string',
                'max:255',
                'regex:/^(?!.*\s{2,}).+$/',
                'unique:event,name,' . $id_event . ',id_event',
            ],
            'content' => [
                'required',
                'string',
                'regex:/^(?!.*\s{2,}).+$/',
            ],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'check_active' => 'required|boolean',
            'start_day' => 'required|date',
            'end_day' => 'required|date|after_or_equal:start_day',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $event = Event::where('id_event', $id_event)->firstOrFail();

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images/events'), $imageName);
            $event->image = $imageName;
        }

        $event->update([
            'name' => $request->input('name'),
            'content' => $request->input('content'),
            'check_active' => $request->input('check_active'),
            'start_day' => $request->input('start_day'),
            'end_day' => $request->input('end_day'),
        ]);

        return redirect()->route('events.index')->with('success', 'Event updated successfully!');
    }

    public function destroy($id)
    {
        // Tìm sự kiện theo id
        $event = Event::find($id);

        // Kiểm tra nếu sự kiện không tồn tại (đã bị xóa ở tab khác)
        if (!$event) {
            return redirect()->route('events.index')->with('error', 'Event no longer exists.');
        }

        // Xóa sự kiện
        $event->delete();

        // Điều hướng lại trang danh sách sự kiện với thông báo thành công
        return redirect()->route('events.index')->with('success', 'Event deleted successfully!');
    }
}
