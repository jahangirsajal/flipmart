@if( Session('success') )
<div class="alert alert-success" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="icon ion-ios-close alert-icon tx-24"></i>
        <span><strong>{{ Session('success') }}</strong> </span>
    </div><!-- d-flex -->
</div>
@endif

<!-- @if( Session('danger') )
<div class="alert bg-danger fade in">
    <a href="#" class="close" data-dismiss="alert">×</a>
    {{ Session('danger') }}
</div>
@endif -->

<!-- @if($errors->any())
@foreach($errors->all() as $error)
<div class="alert bg-danger fade in">
    <a href="#" class="close text-color:white" data-dismiss="alert">×</a>
    {{ $error }}
</div>
@endforeach
@enderror -->

<!-- @if( Session('danger') )
<div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <div class="d-flex align-items-center justify-content-start">
    <i class="icon ion-ios-checkmark alert-icon tx-32 mg-t-5 mg-xs-t-0"></i>
    <span><strong> {{ Session('danger') }}</strong> </span>
  </div>
</div>
@endif -->
@if( Session('danger') )
<div class="alert alert-danger" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="icon ion-ios-close alert-icon tx-24"></i>
        <span><strong>{{ Session('danger') }}</strong> </span>
    </div><!-- d-flex -->
</div>
@endif

@if( Session('warning') )
<div class="alert alert-warning" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
    <div class="d-flex align-items-center justify-content-start">
        <i class="icon ion-ios-close alert-icon tx-24"></i>
        <span><strong>{{ Session('warning') }}</strong> </span>
    </div><!-- d-flex -->
</div>
@endif