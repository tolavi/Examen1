@extends('layouts.app')

@section('title', 'Lista de Vehículos')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h4>🚗 Lista de Vehículos</h4>
        <a href="{{ route('vehiculos.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Nuevo Vehículo
        </a>
    </div>
    <div class="card-body">
        @if($vehiculos->isEmpty())
            <div class="alert alert-info text-center">
                <h5>No hay vehículos registrados</h5>
                <p>Haz clic en "Nuevo Vehículo" para agregar el primero.</p>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th>ID</th>
                            <th>Marca</th>
                            <th>Modelo</th>
                            <th>Año</th>
                            <th>Placa</th>
                            <th>Color</th>
                            <th>Propietario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($vehiculos as $vehiculo)
                            <tr>
                                <td>{{ $vehiculo->id }}</td>
                                <td>{{ $vehiculo->marca }}</td>
                                <td>{{ $vehiculo->modelo }}</td>
                                <td>{{ $vehiculo->anio }}</td>
                                <td><span class="badge bg-success">{{ $vehiculo->placa }}</span></td>
                                <td>{{ $vehiculo->color }}</td>
                                <td>{{ $vehiculo->propietario }}</td>
                                <td>
                                    <a href="{{ route('vehiculos.edit', $vehiculo) }}" 
                                       class="btn btn-warning btn-sm">✏️ Editar</a>
                                    <form action="{{ route('vehiculos.destroy', $vehiculo) }}" 
                                          method="POST" 
                                          style="display:inline-block;"
                                          onsubmit="return confirm('¿Estás seguro de eliminar este vehículo?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">🗑️ Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</div>
@endsection