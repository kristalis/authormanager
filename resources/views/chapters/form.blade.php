
     {{csrf_field()}}
        <div class="form-group row">
        
        {!! Form::hidden('bookId', $bookId, ['class' => 'form-control input-text', 'id' => 'bookId','placeholder' => 'Book']) !!}
                
                            
        </div>
            <div class="form-group row">
                          
                            <div class="col-md-10 ">
                              @if ($errors->has('title'))
                                    <span class="text-warning">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                @endif                       
      {!! Form::text('title', null, ['class' => 'form-control input-text', 'id' => 'title','placeholder' => 'Chapter Title']) !!}
      
                              
                            </div>
                            <div class="col-md-2">
                               @if ($errors->has('chapterNr'))
                                    <span class="text-warning">
                                        <strong>{{ $errors->first('chapterNr') }}</strong>
                                    </span>
                                @endif                         
      {!! Form::text('chapterNr', null, ['class' => 'form-control input-text', 'id' => 'title','placeholder' => 'Chapter']) !!}

                                  
                            </div>
                        </div>
                         <div class="form-group row">
                           @if ($errors->has('page'))
                                    <span class="text-warning">
                                        <strong>{{ $errors->first('page') }}</strong>
                                    </span>
                                @endif
                         {!! Form::textarea('page', null, ['class' => 'form-control input-text', 'id' => 'summary-ckeditor', 'size' => '30x30','placeholder' => 'Write a Chapter']) !!}
    
                        
                               
                                 
                        </div>
                          
             {!! Form::submit($submitButtonText, ['class' => 'btn btn-block btn-primary']) !!}
            
     