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

                      <a href="{{ url('/prize') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                      <a href="{{ url('/prize/' . $prize->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                      <form method="POST" action="{{ url('prize' . '/' . $prize->id) }}" accept-charset="UTF-8" style="display:inline">
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
                                      <th>ID</th><td>{{ $prize->id }}</td>
                                  </tr>
                                  <tr><th> Item </th><td> {{ $prize->item }} </td></tr>
                                  <tr><th> Gift </th><td> {{ $prize->gift }} </td></tr>
                                  <tr><th> Code </th><td> {{ $prize->code }} </td></tr>
                                  <tr><th> Quantity </th><td> {{ $prize->quantity }} </td></tr>
                                  <tr><th> Total Week In Month </th><td> {{ $prize->total_week_in_month }} </td></tr>
                                  <tr><th> Total Quantity In Month </th><td> {{ $prize->total_quantity_in_month }} </td></tr>
                                  <tr><th> Probability </th><td> {{ $prize->probability }} </td></tr>
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
