
      
        			@if (session('existe'))
								<div class="single-feature" style="margin-top:10em;margin-bottom:25px;">
									<div class="title">
										@if(session('name'))
										<h4>Bienvenue {!! session('name') !!}</h4>
										@endif
									</div>
									<div class="desc-wrap">
											@if(session('remercie'))
												<p class="mb-1 mt-1" style="text-align:justify;font-weight:700; color:black"> {!! session('remercie') !!}</p>
                      @endif
											@if(session('sms'))
												<p class="mb-1 mt-1" style="text-align:justify;font-weight:700; color:black"> {!! session('sms') !!}</p>
                      @endif
											@if(session('info'))
												<p class="mb-1 mt-1" style="text-align:justify;"> <span style="font-weight:900;color:blue;">INFORMATION : </span> <span style="font-weight:700; color:black"> {!! session('info') !!}</span></p>
                      @endif
										<!-- <a href="#">Join Now</a> -->
									</div>
								</div>

					@endif




			<!-- Button trigger modal -->
<!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button> -->

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->
	