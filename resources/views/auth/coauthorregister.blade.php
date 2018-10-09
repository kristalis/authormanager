
                   

                        <div class="form-group row">
                            <label for="name" class="col-form-label ">Name</label>

 
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="text-warning" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                             
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-form-label">{{ __('E-Mail Address') }}</label>

                                 <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="text-warning" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                             
                        </div>
                        <div class="form-group{{ $errors->has('schoolname') ? ' has-error' : '' }} row">
                            <label for="schoolname" class="col-form-label">School</label>

                         
                                <input id="schoolname" type="text" class="form-control" name="schoolname" value="{{ old('schoolname') }}" required autofocus>

                                @if ($errors->has('schoolname'))
                                    <span class="text-warning">
                                        <strong>{{ $errors->first('schoolname') }}</strong>
                                    </span>
                                @endif
                             
                        </div>
                       
                        <div class="form-group row">
                             
                                <input id="password" type="hidden" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password">
                             
                        </div>

                        <div class="form-group row">
                          
                                <input id="password-confirm" type="hidden" class="form-control" name="password_confirmation" >
                           
                        </div>
                      
                        <div class="form-group row mb-0">
                                 <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                         </div>
                    </form>
               