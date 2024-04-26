
@if (Session::has('echec'))
<div class="alert alert-danger" style="width:100%">{{ Session::get('echec') }} </div>

@elseif(Session::has('warning'))
<div class="alert alert-warning" style="width:100%">{{ Session::get('warning') }}</div>

@elseif(Session::has('echec_reference'))
<div class="alert alert-warning " style="width:100%">{{ Session::get('echec_reference') }}</div>


@elseif(Session::has('succes'))
<div class="alert alert-success " style="width:100%">{{ Session::get('succes') }}</div>
@endif
