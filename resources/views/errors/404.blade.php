@if(Request::is('*'.config('app.admin_uri').'*'))
  @include('backoffice.errors.404')
@else
  @include('frontsite.errors.404')
@endif