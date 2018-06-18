@extends('layouts.home')
@section('content')
          <div class="animated fadeIn">
            <!--/.row-->
            <div class="row">
              <div class="col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <i class="fa fa-edit"></i>Update Profile
                  </div>
                  <div class="card-body collapse show" id="collapseExample">
                    	{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PATCH')) }}                
                      <div class="form-group">
                        {{ Form::label('name', 'Name') }}
                        <div class="controls">
                          <div class="input-group">
                            {{ Form::text('name', null, array('class' => 'form-control')) }}
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        {{ Form::label('email', 'Email') }}
                        <div class="controls">
                          <div class="input-group">
                            {{ Form::email('email', null, array('class' => 'form-control')) }}
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        {{ Form::label('password', 'Password') }}
                        <div class="controls">
                          <div class="input-group">
                            {{ Form::password('password', null, array('class' => 'form-control')) }}
                          </div>
                        </div>
                      </div>
                      <div class="form-actions">
                      	{{ Form::submit('Save Changes', array('class' => 'btn btn-primary')) }}
                      </div>
                    {{ Form::close() }}
                  </div>
                </div>
              </div>
              <!--/.col-->
            </div>
            <!--/.row-->
          </div>
@endsection