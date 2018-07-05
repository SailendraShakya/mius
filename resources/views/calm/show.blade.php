@extends('layouts.home')
@section('content')
          <div class="animated fadeIn">
            <!--/.row-->
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-edit"></i>Detail
                  </div>
                  <div class="card-body">

                      <a href="{{ url('/calm') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                      <a href="{{ url('/calm/' . $calm->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <form method="POST" action="{{ url('calm' . '/' . $calm->id) }}" accept-charset="UTF-8" style="display:inline">
                          {{ method_field('DELETE') }}
                          {{ csrf_field() }}
                          <button type="submit" class="btn btn-danger btn-sm" title="Delete Post" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                      </form>
                      <br/>
                      <br/>

                      <div class="table-responsive">
                          <table class="table">
                              <tbody>
                                  <tr>
                                      <th>ID</th><td>{{ $calm->id }}</td>
                                  </tr>
                                  <tr><th> Name </th><td> {{ $calm->name }} </td></tr>
                                  <tr><th> Description </th><td> {{ $calm->description }} </td></tr>
                                  <tr><th> Steps </th><td> {{ $calm->steps }} </td></tr>
                                  <tr><th> Process Image </th>
                                    <td>
                                      <img src="{{ url('storage/process_image/'.$calm->process_image) }}" height="200px" alt="process">
                                    </td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>

                  </div>
                </div>
              </div>
              <!--/.col-->
            </div>
            <!--/.row-->
          </div>
@endsection
