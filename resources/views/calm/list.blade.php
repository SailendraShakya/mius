@extends('layouts.home')
@section('content')
<div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                <div class="card-header">
                  <i class="fa fa-align-justify"></i> Exercise
                  <div class="card-header-actions">
                    <a href="{{ url('/calm/create') }}" class="card-header-action" target="_blank">
                    <small class="fa">Add</small>
                    </a>
                  </div>
                </div>
                  <!-- <div class="card-header">
                    <i class="fa fa-align-justify"></i> Exercise
                  </div> -->
                  <div class="card-body">
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Name</th>
                          <th>Added Date</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
    foreach ($calms as $calm) {
     ?>
      <tr>
                          <td><?php echo $calm->name;?></td>
                          <td><?php echo $calm->created_at;?></td>
                          <td>
                            <span class="badge badge-success"><?php echo $calm->status;?></span>
                          </td>
                          <td>
                            <a href="{{ url('/calm/' . $calm->id) }}" title="View Post"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                            <a href="{{ url('/calm/' . $calm->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>

                            <form method="POST" action="{{ url('/calm' . '/' . $calm->id) }}" accept-charset="UTF-8" style="display:inline">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <button type="submit" class="btn btn-danger btn-sm" title="Delete Post" onclick="return confirm(&quot;Confirm delete?&quot;)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</button>
                            </form>
                          </td>
                        </tr>
     <?php
    }
                        ?>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
              <!--/.col-->
            </div>
            <!--/.row-->
          </div>

        </div>
@endsection
