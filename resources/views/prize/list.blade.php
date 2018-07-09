@extends('layouts.home')
@section('content')
<div class="container-fluid">
  <div class="animated fadeIn">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-header">
            <i class="fa fa-align-justify"></i> Main Prize
            <div class="card-header-actions">
              <a href="{{ url('/prize/create') }}" class="card-header-action" target="_blank">
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
                  <th>Item</th>
                  <th>Gift</th>
                  <th>Code</th>
                  <th>Qty</th>
                  <th>Total Week In 1 Month</th>
                  <th>Total Qty for 1 Month</th>
                  <th>Probability Score</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($prizes as $prize) {
                ?>
                <tr>
                  <td><?php echo $prize->item;?></td>
                  <td><?php echo $prize->gift;?></td>
                  <td><?php echo $prize->code;?></td>
                  <td><?php echo $prize->quantity;?></td>
                  <td><?php echo $prize->total_week_in_month;?></td>
                  <td><?php echo $prize->total_quantity_in_month;?></td>
                  <td><?php echo $prize->probability;?></td>
                  <td>
                    <a href="{{ url('/prize/' . $prize->id) }}" title="View Post"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                    <a href="{{ url('/prize/' . $prize->id . '/edit') }}" title="Edit Post"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                    <form method="POST" action="{{ url('/prize' . '/' . $prize->id) }}" accept-charset="UTF-8" style="display:inline">
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
              <tr>
                <td colspan="3">Total:</td>
                <td colspan="">{{number_format($total,2)}}</td>
                <td></td>
                <td colspan="3">{{number_format($totalMonth,2)}}</td></tr>
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