@if($texto=Session::get("mensaje"))
<div class="my-3 alert alert-warning" role="alert">
{{$texto}}
</div>
@endif