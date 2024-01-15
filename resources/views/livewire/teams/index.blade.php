@vite('resources/css/app.css')

@extends('adminlte::page')

@section('content')
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Title -->
        <h2 class="text-3xl font-semibold leading-tight text-center p-2">Equipos</h2>

        <!-- Button add new team -->
        <button wire:click="create()" class="bg-blue-500 text-white px-4 py-2 mb-2 rounded-lg overflow-hidden">
            Nuevo Equipo
        </button>

        <!-- Modal open -->
        @if ($isOpen)
            @include('livewire.teams.create')
        @endif

        <table class="w-full text-sm text-left rtl:text-right text-gray-500 border-collapse rounded-lg overflow-hidden">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
                <tr>
                    <!-- Ennumerador de filas -->
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Equipo</th>
                    <!-- <th scope="col" class="px-6 py-3">Madrina</th> -->
                    <th scope="col" class="px-6 py-3">Matrícula</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">Descripción</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($teams as $team)
                    <tr class="bg-white border-b hover:bg-gray-50">
                        <td class="px-6 py-3">{{ $team->id }}</td>
                        <td class="px-6 py-3">{{ $team->name }}</td>
                        <!-- <td class="px-6 py-4">{{ $team->goodmother }}</td> -->
                        <td class="px-6 py-3">{{ number_format($team->enrollment, 2) }}</td>
                        <td class="px-6 py-3">{{ $team->status == 1 ? 'Activo' : 'Inactivo' }}</td>
                        <td class="px-6 py-3">{{ $team->description }}</td>
                        <td class="px-6 py-3">
                            <x-danger-button wire:click="confirmTeamDeletion ({{ $team->id }})"
                                wire:loading.attr="disabled">
                                {{ __('Eliminar') }}
                            </x-danger-button>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-4">
            {{ $teams->links() }}
        </div>

    </div>

@stop
