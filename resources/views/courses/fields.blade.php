<!-- Company Id Field -->


<!-- Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('title', 'Title:') !!}
    {!! Form::text('title', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Body Field -->
<div class="form-group col-sm-12">
    {!! Form::label('body', 'Body:') !!}
    {!! Form::text('body', null, ['class' => 'form-control', 'required']) !!}
</div>

<!-- Published On Field -->
<div class="form-group col-sm-12">
    {!! Form::label('published_on', __('forms.Published On:')) !!}
    {!! Form::text('published_on', null, ['class' => 'form-control','id'=>'published_on', 'required']) !!}
</div>

@push('scripts')
    <script type="text/javascript">
    $('.select2').select2({
    width: '100%' // need to override the changed default
});
    </script>
   <script type="text/javascript">
           $('#published_on').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           });

    $('.select2').select2({
    width: '100%' // need to override the changed default
});
       </script>
@endpush



@push('scripts')
 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>

	<script>
         $(document).ready(function() {
        $('#category_id').on('change', function() {
            var categID = $(this).val();
            if(categID) {
                $.ajax({
                    url: '/findsubcategWithcategID/'+$(this).val(),
                    type: "GET",
                    data : {"_token":"{{ csrf_token() }}"},
                    dataType: "json",
                    success:function(data) {
                        console.log(data);
                      if(data){
                         $('#subcateg_id').empty();
                         $('#subcateg_id').focus;
                         $('#subcateg_id').append('<option value="">-- Select sub category --</option>'); 
                         $.each(data, function(key, value){
                            $('select[name="subcateg_id"]').append('<option value="'+ value.id +'">' + value.name+ '</option>');
                         });
                        }else{
                         $('#subcateg_id').empty();
                        }
                    }
                });
            }else{
              $('#subcateg_id').empty();
            }
        });
    });
    </script>
@endpush
<!-- Category Id Field -->


	<div class="form-group  col-sm-12 {{ ($errors->has('roll'))?'has-error':'' }}">
	    <label for="roll">category <span class="required">*</span></label>
	    <select name="category_id" class="form-control" id="category_id">

		@foreach ($listcateg as $listcateg)

            @if(isset($courses->categories['id']))
                @if($listcateg->id == $courses->categories['id'])
                    <option selected="selected" value="{{ $listcateg->id }}">{{ ucfirst($listcateg->name) }}</option>
                @else
                    <option value="{{ $listcateg->id }}">{{ ucfirst($listcateg->name) }}</option>
                @endif
            @else
                <option value="{{ $listcateg->id }}">{{ ucfirst($listcateg->name) }}</option>
            @endif

		@endforeach
	     </select>
	</div>
			  

	<div class="form-group  col-sm-12 {{ ($errors->has('name'))?'has-error':'' }}">
    <label for="roll">sub Categories </label>
    <select name="subcateg_id" class="form-control" id="subcateg_id">
      <option value="">{{isset($courses->subcategorie['name']) ?$courses->subcategorie['name']: null}}</option>
    </select>
  </div>

			


<div class="form-group col-sm-12">
    {!! Form::label('target_id', __('front.Target Audiance list:')) !!}
    {!! Form::select('target_id[]', $listtarget,isset($targetvalues)?$targetvalues:null, ['class' => 'form-control select2','multiple']) !!}
</div>



<!-- Submit Field -->
<div class="form-group buttons-action-lms col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
</div>



