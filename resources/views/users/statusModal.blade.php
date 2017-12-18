<a href="#" type="button" data-toggle="modal" data-target="#statusModal">
    <i class="fa fa-pencil" aria-hidden="true"></i>Tulis kiriman !
</a>
<!-- Modal -->
<div class="modal up fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">

			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">close</span></button>
				<h4 class="modal-title" id="myModalLabel" style="color: white;">Tulis kiriman</h4>
			</div>

			<div class="modal-body">
				<form method="post" action="/member/status/{{Auth::user()->id}}">
            {{csrf_field()}}
            <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }} ">
                <textarea id="status" name="status" rows="4" cols="100%" style="float: left;" class="form-control">{{old('status')}}</textarea>
                @if($errors->has('status'))
                    <span class="help-block"> {{$errors->first('status')}} </span>
                @endif
            </div>
            <button type="submit" class="btn btn-success btn-xs">update</button>
        </form>
			</div>

		</div><!-- modal-content -->
	</div><!-- modal-dialog -->
</div><!-- modal -->
