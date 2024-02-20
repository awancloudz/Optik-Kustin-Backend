@if (isset($customer))
{!! Form::hidden('id', $customer->id) !!}
@endif

{{-- Nama --}}
@if($errors->any())
<div class="form-group {{ $errors->has('nama') ? 'has-error' : 'has-success' }}"></div>
@else
<div class="form-group">
@endif
	{!! Form::label('nama','Nama',['class' => 'control-label']) !!}
	{!! Form::text('nama', null,['class' => 'form-control']) !!}
	@if ($errors->has('nama'))
	<span class="help-block">{{ $errors->first('nama') }}</span>
	@endif
</div>

{{-- Alamat --}}
@if($errors->any())
<div class="form-group {{ $errors->has('alamat') ? 'has-error' : 'has-success' }}"></div>
@else
<div class="form-group">
@endif
	{!! Form::label('alamat','Alamat',['class' => 'control-label']) !!}
	{!! Form::text('alamat', null,['class' => 'form-control']) !!}
	@if ($errors->has('alamat'))
	<span class="help-block">{{ $errors->first('alamat') }}</span>
	@endif
</div>

{{-- NoTelp --}}
@if($errors->any())
<div class="form-group {{ $errors->has('notelp') ? 'has-error' : 'has-success' }}"></div>
@else
<div class="form-group">
@endif
	{!! Form::label('notelp','No.Telp',['class' => 'control-label']) !!}
	{!! Form::text('notelp', null,['class' => 'form-control']) !!}
	@if ($errors->has('notelp'))
	<span class="help-block">{{ $errors->first('notelp') }}</span>
	@endif
</div>
<hr>
<b><h4>Resep</h4></b>
<hr>
<div class="row">
  <div class="col-sm-2"><b>KANAN</b></div>
  <div class="form-group">
  	<div class="col-sm-1">SPH{!! Form::text('r_sph', null,['class' => 'form-control','placeholder' => 'SPH']) !!}</div>
  	<div class="col-sm-1">CYL{!! Form::text('r_cyl', null,['class' => 'form-control','placeholder' => 'CYL']) !!}</div>
  	<div class="col-sm-1">AXS{!! Form::text('r_axs', null,['class' => 'form-control','placeholder' => 'AXS']) !!}</div>
  	<div class="col-sm-1">ADD{!! Form::text('r_add', null,['class' => 'form-control','placeholder' => 'ADD']) !!}</div>
  	<div class="col-sm-1">MPD{!! Form::text('r_mpd', null,['class' => 'form-control','placeholder' => 'MPD']) !!}</div>
  	<div class="col-sm-1">PV{!! Form::text('r_pv', null,['class' => 'form-control','placeholder' => 'PV']) !!}</div>
  	<div class="col-sm-1">SH{!! Form::text('r_sh', null,['class' => 'form-control','placeholder' => 'SH']) !!}</div>
  </div>
</div>
<div class="row">
  <div class="col-sm-2"><b>KIRI</b></div>
  <div class="form-group">
  	<div class="col-sm-1">SPH{!! Form::text('l_sph', null,['class' => 'form-control','placeholder' => 'SPH']) !!}</div>
  	<div class="col-sm-1">CYL{!! Form::text('l_cyl', null,['class' => 'form-control','placeholder' => 'CYL']) !!}</div>
  	<div class="col-sm-1">AXS{!! Form::text('l_axs', null,['class' => 'form-control','placeholder' => 'AXS']) !!}</div>
  	<div class="col-sm-1">ADD{!! Form::text('l_add', null,['class' => 'form-control','placeholder' => 'ADD']) !!}</div>
  	<div class="col-sm-1">MPD{!! Form::text('l_mpd', null,['class' => 'form-control','placeholder' => 'MPD']) !!}</div>
  	<div class="col-sm-1">PV{!! Form::text('l_pv', null,['class' => 'form-control','placeholder' => 'PV']) !!}</div>
  	<div class="col-sm-1">SH{!! Form::text('l_sh', null,['class' => 'form-control','placeholder' => 'SH']) !!}</div>
  </div>
</div><br>
{{-- Submit button --}}
<div class="form-group">
	{!! Form::submit($submitButtonText,['class' => 'btn btn-primary form-control']) !!}
</div>