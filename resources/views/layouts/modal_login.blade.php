<div class="container">
<div class="modal fade" id="myModal_login">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
              <h4 class="modal-title">Log Masuk</h4>
            </div>
            <div class="modal-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/login') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">E-Mail</label>
    
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}">
    
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
    
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">Katalaluan</label>
    
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control" name="password">
    
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="modal-footer">
                            <div class="form-group">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">
                                                <i class="fas fa-sign-in-alt"></i> Log Masuk
                                        </button>
                                <a class="btn btn-link" href="{{ url('/password/reset') }}">Telupa katalaluan?</a>
                            </div>
                        </div>
                    </div>
            </form>
    </div>
    </div>
</div>
</div>
</div>




 