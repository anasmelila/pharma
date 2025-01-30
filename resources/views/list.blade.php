@include('header')

                <li class="user-footer">

                  <a href="{{route('logout')}}" class="btn btn-default btn-flat float-end">Sign out</a>
                </li>  </ul>  </li> </ul> </div></nav>

@include('menu')

      <main class="app-main">
       <div class="app-content-header">

          <div class="container-fluid">

            <div class="row">
                @if(session()->has('message'))
                <p>{!! nl2br(e(session()->get('message'))) !!}</p>
                @endif
              <div class="col-sm-6">  <h1><a href="{{ route('addreport') }}" class="btn btn-primary">Add New</a></div>
              <div class="col-sm-6">

                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
              </div>
            </div>

          </div>

        </div>

        <div class="app-content">

          <div class="container-fluid">

            <div class="row">
              <div class="col-md-6">
                <div class="card mb-4">
                  <div class="card-header"><h3 class="card-title">ReportS</h3></div>

                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th style="width: 10px">#</th>
                          <th>Date</th>
                          <th>Task</th>
                          <th>Action</th>
                          <th>Status</th>
                        </tr>


                      </thead>
                      <tbody>
                        @if ($emp_reports->count() > 0)
                            @foreach ($emp_reports as $index => $report)
                            <tr class="align-middle">
                                <td>{{ $emp_reports->firstItem() + $index }}</td>

                                <td>{{ $report->created_at->format('Y-m-d') }}</td>
                                <td>{{ $report->title }}</td>
                                <td>
                                    <a href="{{ asset('storage/images/' . $report->image) }}" target="_blank" class="btn btn-sm btn-primary">
                                        <i class="fas fa-eye"></i> View
                                    </a>
                                    <a href="{{ route('delete.report', encrypt($report->rep_id)) }}" class="btn btn-sm btn-danger">
                                        <i class="fas fa-trash"></i> Delete
                                    </a>
                                </td>
                                <td>
                                    @if ($report->status == '0')
                                        <span class="badge bg-warning">Pending</span>
                                    @elseif ($report->status == '1')
                                        <span class="badge bg-success">Approved</span>
                                    @else
                                        <span class="badge bg-danger">Rejected</span>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="4" class="text-center">No reports found.</td>
                            </tr>
                        @endif
                    </tbody>
                    </table>
                  </div>

                   <div class="card-footer clearfix">
<!-- Pagination Links -->
<div class="pagination">
    {{ $emp_reports->links() }}
</div>
                   </ul>
                  </div>
                </div>


      </main>

      @include('footer')
