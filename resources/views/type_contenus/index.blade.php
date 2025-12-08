@extends('layout')

@section('title')
<div class="row">
    <div class="col-sm-6"><h3 class="mb-0">Langues</h3></div>
    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-end">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Langues</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<!-- IMPORTANT: définir la config Tailwind AVANT d'inclure le CDN -->
<script>
    window.tailwind = window.tailwind || {};
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    primary: {
                        50: '#f0f9ff',
                        100: '#e0f2fe',
                        200: '#bae6fd',
                        300: '#7dd3fc',
                        400: '#38bdf8',
                        500: '#0ea5e9',
                        600: '#0284c7',
                        700: '#0369a1',
                        800: '#075985',
                        900: '#0c4a6e',
                    },
                    secondary: {
                        50: '#f5f3ff',
                        100: '#ede9fe',
                        200: '#ddd6fe',
                        300: '#c4b5fd',
                        400: '#a78bfa',
                        500: '#8b5cf6',
                        600: '#7c3aed',
                        700: '#6d28d9',
                        800: '#5b21b6',
                        900: '#4c1d95',
                    }
                },
                fontFamily: {
                    sans: ['Inter', 'sans-serif'],
                },
            }
        }
    }
</script>

<!-- Tailwind CDN -->
<script src="https://cdn.tailwindcss.com"></script>

<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<!-- jQuery (doit être avant DataTables) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="" crossorigin="anonymous"></script>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<style>
    .animate-bounce-slow {
        animation: bounce-slow 3s infinite;
    }
    @keyframes bounce-slow {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }

    .progress-bar {
        height: 8px;
        border-radius: 4px;
        overflow: hidden;
    }
    .progress-bar-fill {
        height: 100%;
        transition: width 0.6s ease;
    }

    /* Style pour DataTables */
    #languesTable {
        width: 100% !important;
    }

    /* Optionnel : garder l'en-tête visible lors du scroll */
    /* .dataTables_scrollHeadInner thead th { position: sticky; top: 0; background: white; } */
</style>

<div class="overflow-x-auto">
    <table id="languesTable" class="display min-w-full divide-y divide-gray-200">
        <thead class="bg-gray-50">
            <tr>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Code Langue</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nom Langue</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
            @foreach($langues as $langue)
            <tr class="align-middle">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $langue->code_langue }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $langue->nom_langue }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $langue->description }}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                    <a href="{{ route('langues.edit', $langue->id)}}" class="btn btn-sm btn-primary text-white font-bold py-1 px-3 rounded text-xs">
                       <i class="fa-solid fa-pen-to-square"></i> 
                    </a>
                    <button class="btn btn-sm btn-danger text-white font-bold py-1 px-3 rounded text-xs">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Initialisation DataTables (après chargement jQuery + DataTables) -->
<script>
    $(document).ready(function() {
        $('#languesTable').DataTable({
            // Exemples d'options utiles : paging, responsive, language
            paging: true,
            pageLength: 10,
            lengthChange: true,
            // responsive: true, // nécessite DataTables Responsive extension
            // language: { url: '/path/to/French.json' } // pour traduire en FR
        });
    });
</script>
@endsection
