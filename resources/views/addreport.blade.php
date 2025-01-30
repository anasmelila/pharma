@include('header')

                <li class="user-footer">

                    <a href="{{route('logout')}}" class="btn btn-default btn-flat float-end">Sign out</a>
                </li> </ul> </li> </ul> </div></nav>

      @include('menu')

      <main class="app-main">

        <div class="app-content-header">

          <div class="container-fluid">

            <div class="row">
              <div class="col-sm-6"><h3 class="mb-0">Create Report</h3></div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-end">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Create Report</li>
                </ol>
              </div>
            </div>

          </div>

        </div>

        <div class="app-content">

          <div class="container-fluid">

            <div class="row g-4">

              <div class="col-md-6">

                <div class="card card-primary card-outline mb-4">

                  <div class="card-header"><div class="card-title">Report</div></div>

                  <form action="{{route('save.report')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="card-body">
                      <div class="mb-3">
                        <input type="hidden" name="emp_id" value="{{ encrypt(auth()->user()->emp_id) }}" />
                        <label for="exampleInputEmail1" class="form-label" >Title</label>
                        <input
                          type="text"
                          class="form-control @error('title') is-invalid @enderror"
                          id="exampleInputEmail1" name="title"
                          aria-describedby="emailHelp"
                        />

                      </div>

                      <div class="input-group mb-3">
                        <input type="file" class="form-control" id="inputGroupFile02" name="image"/>
                        <label class="input-group-text" for="inputGroupFile02">Upload</label>
                      </div>

                    </div>

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <!--end::Footer-->
                  </form>

                </div>

              </div>

              <div class="col-md-6">

              </div>

            </div>

          </div>

        </div>

      </main>
      <!--end::App Main-->
      <!--begin::Footer-->
      @include('footer')
