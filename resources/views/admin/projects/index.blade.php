@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="bg-gray-100 shadow">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 flex flex-col items-center">
            <a href="{{ route('projects.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium">Overzicht Project</a>
            <a href="#" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm"></a>
            <a href="{{route('projects.create')}}" class="text-gray-800 px-3 py-2 rounded-md text-sm font-medium">project toevoegen</a>
            <a href="#" class="text-gray-800 hover:text-teal-600 transition ease-in-out duration-500 px-3 py-2 rounded-md text-sm"></a>
        </div>
    </nav>
@endsection

@section('content')
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Id</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Details</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edit</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delete</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y">
                @foreach ($projects as $project)
                    <tr class="text-gray-700">
                        <td class="px-6 py-4 whitespace-nowrap">{{ $project->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap">{{ $project->name }}</td>
                        <td class="px-6 py-4 whitespace-nowrap"><a href="{{ route('projects.show', ['project' => $project->id]) }}">Details</a></td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="{{ route('projects.edit', ['project' => $project->id]) }}">Edit</a>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center space-x-4 text-sm">
                                <a href="#">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
