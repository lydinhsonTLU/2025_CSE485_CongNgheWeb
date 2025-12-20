<?php

namespace App\Http\Controllers;

use App\Models\Issues;
use App\Models\Computers;
use Illuminate\Http\Request;

class IssuesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $issues = Issues::with('computer')->paginate(10); // Lấy 5 bản ghi mỗi trang
        return view('issues.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $computers = Computers::all();
        return view('issues.create', compact('computers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved'
        ], [
            'computer_id.required' => 'Vui lòng chọn máy tính',
            'computer_id.exists' => 'Máy tính không tồn tại',
            'reported_by.required' => 'Vui lòng nhập tên người báo cáo',
            'reported_date.required' => 'Vui lòng chọn ngày báo cáo',
            'description.required' => 'Vui lòng nhập mô tả sự cố',
            'urgency.required' => 'Vui lòng chọn mức độ sự cố',
            'status.required' => 'Vui lòng chọn trạng thái'
        ]);

        Issues::create($validated);

        return redirect()->route('issues.index')
            ->with('success', 'Thêm vấn đề mới thành công!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $issue = Issues::with('computer')->findOrFail($id);
        return view('issues.show', compact('issue'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $issue = Issues::findOrFail($id);
        $computers = Computers::all();
        return view('issues.edit', compact('issue', 'computers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $validated = $request->validate([
            'computer_id' => 'required|exists:computers,id',
            'reported_by' => 'required|string|max:50',
            'reported_date' => 'required|date',
            'description' => 'required|string',
            'urgency' => 'required|in:Low,Medium,High',
            'status' => 'required|in:Open,In Progress,Resolved'
        ], [
            'computer_id.required' => 'Vui lòng chọn máy tính',
            'reported_by.required' => 'Vui lòng nhập tên người báo cáo',
            'reported_date.required' => 'Vui lòng chọn ngày báo cáo',
            'description.required' => 'Vui lòng nhập mô tả sự cố',
            'urgency.required' => 'Vui lòng chọn mức độ sự cố',
            'status.required' => 'Vui lòng chọn trạng thái'
        ]);

        $issue = Issues::findOrFail($id);
        $issue->update($validated);

        return redirect()->route('issues.index')
            ->with('success', 'Cập nhật thông tin vấn đề thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $issue = Issues::findOrFail($id);
        $issue->delete();

        return redirect()->route('issues.index')
            ->with('success', 'Xóa vấn đề thành công!');
    }
}
