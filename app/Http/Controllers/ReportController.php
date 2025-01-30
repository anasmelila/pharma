<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
{
    public function savereport()
    {
        request()->validate([
            'title' => 'required|string|max:100'
        ]);

        $input = [
            'title' => request('title'),
            'emp_id' => decrypt(request('emp_id'))
        ];

        if (request()->hasFile('image')) {
            $extension = request('image')->extension();
            $fileName = 'user_pic' . time() . '.' . $extension;
            request('image')->storeAs('images', $fileName);
            $input['image'] = $fileName;
        }

        Report::create($input);

        return redirect()->route('list')->with('message', 'Report Created Successfully !!!');
    }

    public function delete($reportId)
    {
        $report = Report::find(decrypt($reportId));
        $report->delete();

        return redirect()->route('list')->with('message', 'Report deleted Successfully !!!');
    }

    public function updateStatus(Request $request, $reportId)
    {
        $request->validate([
            'status' => 'required|in:0,1,2', // Validating the status value
        ]);

        $report = Report::findOrFail($reportId);
        $report->status = $request->status;
        $report->save();

        return redirect()->back()->with('message', 'Status updated successfully!');
    }
}
