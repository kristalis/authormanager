
     {{csrf_field()}}
            <div class='form-group row
            '>
                          
                            
      {!! Form::text('title', null, ['class' => 'form-control input-text', 'id' => 'title','placeholder' => 'Book Title']) !!}
                               <div>
                              @if ($errors->has('title'))
                                    <span class="text-warning">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>

                                @endif
                             </div/>
                        </div>
                         <div class="form-group row">
                              {!! Form::textarea('brief', null, ['class' => 'form-control input-text', 'id' => 'summary-ckeditor', 'size' => '30x9','placeholder' => 'Book brief']) !!}
 
                                @if ($errors->has('brief'))
                                    <span class="text-warning">
                                        <strong>{{ $errors->first('brief') }}</strong>
                                    </span>
                                @endif
                                   
                        </div>
                           <div class="form-group row">
                                 {!! Form::text('coverimage', null, ['class' => 'form-control input-text', 'id' => 'coverimage','placeholder' => 'Book Cover']) !!}

                              @if ($errors->has('bride'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('bride') }}</strong>
                                    </span>
                                @endif
                             
                        </div>
                        {!! Form::submit($submitButtonText, ['class' => 'btn btn-block btn-primary']) !!}
 
                        