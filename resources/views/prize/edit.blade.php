@extends('layouts.home')
@section('content')
          <div class="animated fadeIn">
            <!--/.row-->
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-edit"></i>Edit Main Prize #{{ $prize->id }}

                    <a href="{{ url('/prize') }}" title="Back" class="card-header-actions"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                  </div>
                  <div class="card-body collapse show" id="collapseExample">
                    @if ($errors->any())
                        <ul class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form method="POST" action="{{ url('/prize/' . $prize->id) }}" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
                        {{ method_field('PATCH') }}
                        {{ csrf_field() }}
                        @include ('prize.form')
                    </form>

                  </div>
                </div>
              </div>
              <!--/.col-->
            </div>
            <!--/.row-->
          </div>
@endsection
