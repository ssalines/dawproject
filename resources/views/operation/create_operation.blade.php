@extends('layouts.app')

@section('title')

Crear Operacion

@endsection

@section('content')

@if($errors->any())
<div class="container alert alert-danger">
  <h6>Fix the following errors:</h6>
  <br>
  <ul>

    @foreach($errors->all() as $error)

    <li>
      {{ $error }}
    </li>

    @endforeach

  </ul>

</div>
@endif

<form method="post" class="container mt-5" action="/operations">

  @csrf

  <div style="display: none;">
    <input class="input" type="text" name="user_id" value="{{request()->user()->id}}">
  </div>

  <label for="title">
    Operation Title:
  </label>
  <input id="title" name="title" class="mb-2 form-control input {{ $errors->has('title') ? 'is-invalid' : ''}}"
    type="text" value="{{ old('title') }}">

  <label for="operation_type">
    Operation Type:
  </label>
  <input id="operation_type" name="operation_type"
    class="mb-2 form-control input {{ $errors->has('operation_type') ? 'is-danger' : ''}}" type="text"
    name="operation_type" value="{{ old('operation_type') }}">

  <label for="exp_name">
    Exporter Name:
  </label>
  <input id="exp_name" name="exp_name" class="mb-2 form-control input {{ $errors->has('exp_name') ? 'is-danger' : ''}}"
    type="text" name="exp_name" value="{{ old('exp_name') }}">

  <label for="exp_country">
    Export Country:
  </label>
  <input id="exp_country" name="exp_country"
    class="mb-2 form-control input {{ $errors->has('exp_country') ? 'is-danger' : ''}}" type="text" name="exp_country"
    value="{{ old('exp_country') }}">

  <label for="imp_name">
    Importerer Name:
  </label>
  <input id="imp_name" name="imp_name" class="mb-2 form-control input {{ $errors->has('imp_name') ? 'is-danger' : ''}}"
    type="text" name="imp_name" value="{{ old('imp_name') }}">

  <label for="imp_country">
    Import Country:
  </label>
  <input id="imp_country" name="imp_country"
    class="mb-2 form-control input {{ $errors->has('imp_country') ? 'is-danger' : ''}}" type="text" name="imp_country"
    value="{{ old('exp_country') }}">

  <label for="role">
    Role:
  </label>
  <input id="role" name="role" class="mb-2 form-control input {{ $errors->has('role') ? 'is-danger' : ''}}" type="text"
    name="role" value="{{ old('role') }}">

  <label for="item">
    Bought Item:
  </label>
  <input id="item" name="item" class="mb-2 form-control input {{ $errors->has('item') ? 'is-danger' : ''}}" type="text"
    name="item" value="{{ old('item') }}">

  <label for="currency">
    Currency:
  </label>
  <input id="currency" name="currency" class="mb-2 form-control input {{ $errors->has('currency') ? 'is-danger' : ''}}"
    type="text" name="currency" value="{{ old('currency') }}">

  <label for="price">
    Operation Price:
  </label>
  <input id="price" name="price" class="mb-2 form-control input {{ $errors->has('price') ? 'is-danger' : ''}}"
    type="integer" name="price" value="{{ old('price') }}" onkeypress="validar_number(event)">

  <label for="transport">
    Transport Type:
  </label>
  <input id="transport" name="transport"
    class="mb-2 form-control input {{ $errors->has('transport') ? 'is-danger' : ''}}" type="text" name="transport"
    value="{{ old('transport') }}">

  <label for="incoterm">
    INCOTERM:
  </label>
  <input id="incoterm" name="incoterm" class="mb-2 form-control input {{ $errors->has('incoterm') ? 'is-danger' : ''}}"
    type="text" name="incoterm" value="{{ old('incoterm') }}">

  <label for="payment">
    Payment Method:
  </label>
  <input id="payment" name="payment" class="mb-2 form-control input {{ $errors->has('payment') ? 'is-danger' : ''}}"
    type="text" name="payment" value="{{ old('payment') }}">

  <label for="insurance_carrier">
    Insurance Carrier:
  </label>
  <input id="insurance_carrier" name="insurance_carrier"
    class="mb-2 form-control input {{ $errors->has('insurance_carrier') ? 'is-danger' : ''}}" type="text"
    name="insurance_carrier" value="{{ old('insurance_carrier') }}">

  <label for="legislation">
    Applicable Legislation:
  </label>
  <input id="legislation" name="legislation"
    class="mb-2 form-control input {{ $errors->has('legislation') ? 'is-danger' : ''}}" type="text" name="legislation"
    value="{{ old('legislation') }}">

  <label for="documents">
    Agreed Documents:
  </label>
  <input id="documents" name="documents"
    class="mb-2 form-control input {{ $errors->has('documents') ? 'is-danger' : ''}}" type="text" name="documents"
    value="{{ old('documents') }}">

  <label for="language">
    Contract Language:
  </label>
  <input id="language" name="language" class="mb-2 form-control input {{ $errors->has('language') ? 'is-danger' : ''}}"
    type="text" name="language" value="{{ old('language') }}">

  <label for="contract">
    Contract:
  </label>
  <input id="contract" name="contract" class="mb-2 form-control input {{ $errors->has('contract') ? 'is-danger' : ''}}"
    type="text" name="contract" value="{{ old('contract') }}">

  <!-- 
        <select name="role_id">

            @foreach ($roles as $role)

                <option value="{{ $role->id }}">{{ $role->role_name }}</option>

            @endforeach

        </select>

        <select name="users_id">

            @foreach ($users as $usr)

        <option value="{{ $usr->id }}">{{ $usr->name }}</option>

            @endforeach

        </select> -->

  <div>
    <button type="submit" class="btn btn-primary mt-3">Create Operation</button>
  </div>

  <br>

</form>

<script>
function validar_number(evt) {

  /*Variable que contiene el campo input de tipo number.*/
  var ch = String.fromCharCode(evt.which);

  /*Condición de que si el usuario inserta un caracter que no sea un numero del 0 hasta el 9 no 
  se le dejara introducir-lo en el campo input de tipo number.*/
  if (!(/[0-9]/.test(ch))) {
    evt.preventDefault();
  }

}
</script>

@endsection