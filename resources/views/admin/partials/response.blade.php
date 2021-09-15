<div class="row">
	<div class="col-md-12">
		@if(session('status'))
			<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×
                </button>
				<strong>Success</strong> {{ session('status') }}
			</div>
		@endif
		@if(session('success'))
			<div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×
                </button>
				<strong>Success</strong> {{ session('success') }}
			</div>
		@endif
		@if(session('warning'))
			<div class="alert alert-warning alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×
                </button>
				<strong>Warning</strong> {{ session('warning') }}
			</div>
		@endif
		@if(session('danger'))
			<div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                    ×
                </button>
				<strong>Danger</strong> {{ session('danger') }}
			</div>
		@endif
	</div>
</div>
