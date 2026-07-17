@extends('layouts.app')

@section('title', 'Registrar Vehículo')

@section('content')
<div class="card">
    <div class="card-header">
        <h4>📝 Registrar Nuevo Vehículo</h4>
    </div>
    <div class="card-body">
        <form action="{{ route('vehiculos.store') }}" method="POST">
            @csrf

            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="marca" class="form-label">Marca *</label>
                    <input type="text" 
                           class="form-control @error('marca') is-invalid @enderror" 
                           id="marca" 
                           name="marca" 
                           value="{{ old('marca') }}" 
                           placeholder="Ej: Toyota">
                    @error('marca')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-6 mb-3">
                    <label for="modelo" class="form-label">Modelo *</label>
                    <input type="text" 
                           class="form-control @error('modelo') is-invalid @enderror" 
                           id="modelo" 
                           name="modelo" 
                           value="{{ old('modelo') }}" 
                           placeholder="Ej: Corolla">
                    @error('modelo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="anio" class="form-label">Año *</label>
                    <input type="number" 
                           class="form-control @error('anio') is-invalid @enderror" 
                           id="anio" 
                           name="anio" 
                           value="{{ old('anio') }}" 
                           placeholder="Ej: 2020">
                    @error('anio')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="placa" class="form-label">Placa *</label>
                    <input type="text" 
                           class="form-control @error('placa') is-invalid @enderror" 
                           id="placa" 
                           name="placa" 
                           value="{{ old('placa') }}" 
                           placeholder="Ej: ABC-123" 
                           style="text-transform: uppercase;">
                    @error('placa')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-4 mb-3">
                    <label for="color" class="form-label">Color *</label>
                    <input type="text" 
                           class="form-control @error('color') is-invalid @enderror" 
                           id="color" 
                           name="color" 
                           value="{{ old('color') }}" 
                           placeholder="Ej: Rojo">
                    @error('color')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-md-12 mb-3">
                    <label for="propietario" class="form-label">Propietario *</label>
                    <input type="text" 
                           class="form-control @error('propietario') is-invalid @enderror" 
                           id="propietario" 
                           name="propietario" 
                           value="{{ old('propietario') }}" 
                           placeholder="Nombre completo del propietario">
                    @error('propietario')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('vehiculos.index') }}" class="btn btn-secondary">
                    ⬅️ Cancelar
                </a>
                <button type="submit" class="btn btn-primary">
                    💾 Guardar Vehículo
                </button>
            </div>
        </form>
    </div>
</div>
@endsection