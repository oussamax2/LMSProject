

			<div class="inner-banner">
				<div class="opacity">
					<div class="container">
						<h2>@lang('front.Register Company')</h2>
					</div>
				</div>
			</div>
            <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                    </div>
                    <div class="modal-body">
                      <div class="img-container">
                       <img class="mx-auto d-block" id="picture" src="https://avatars0.githubusercontent.com/u/3456749">
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">@lang('front.Cancel')</button>
                      <button type="button" class="btn btn-primary" id="crop">@lang('front.Crop')</button>
                    </div>
                  </div>
                </div>
              </div>
            @livewireStyles

            @livewire('registercompany')

            @livewireScripts


            @section('css')
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css" integrity="sha256-jKV9n9bkk/CTP8zbtEtnKaKf+ehRovOYeKoyfthwbC8=" crossorigin="anonymous" />
            <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js" integrity="sha256-CgvH7sz3tHhkiVKh05kSUgG97YtzYNnWt6OXcmYzqHY=" crossorigin="anonymous"></script>
            <style type="text/css">
                img {
                  display: block;
                  max-width: 100%;
                }

                .modal-lg{
                  max-width: 580px !important;
                }
                </style>
            @endsection

