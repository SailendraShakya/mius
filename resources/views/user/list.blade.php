@extends('layouts.home')
@section('content')
<div class="container-fluid">
          <div class="animated fadeIn">
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-align-justify"></i> Combined All Table
                  </div>
                  <div class="card-body">
                    <table class="table table-responsive-sm table-bordered table-striped table-sm">
                      <thead>
                        <tr>
                          <th>Username</th>
                          <th>Email</th>
                          <th>Date registered</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
    foreach ($users as $user) {
     ?>
      <tr>
                          <td><?php echo $user->name;?></td>
                          <td><?php echo $user->email;?></td>
                          <td><?php echo $user->created_at;?></td>
                          <td>
                            <span class="badge badge-success"><?php echo $user->status;?></span>
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