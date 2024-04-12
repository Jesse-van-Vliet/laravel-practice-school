
@extends('layouts.layoutadmin')

@section('topmenu')
    <nav class="card">
        <div class="max-w-7xl mx-auto px-2 sm:px6 lg:px8">
            <div class="relative flex items-center justify-between h-16">
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('tasks.index') }}" class="text-gray-800 px-3 py-2 rounded-md text-sm"></a>
                            <a href="{{ route('tasks.create') }}" class="text-gray-800 hover:text-teal-600 transition"></a>

                        </div>
                    </div>
                </div>

            </div>

        </div>

    </nav>
@endsection

@section('content')

    <div class="card nt-6">
        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <div class="card-header">
                    <h1 class="font-semibold">Projecten Task</h1>
                </div>
    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">id</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">name</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">begindate</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">enddate</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">project</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">user</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">actvity</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Details</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Edit</th>
                    <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Delete</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y">
{{--                @can('show task')--}}
                    @foreach ($tasks as $task)
                        <tr class="text-gray-700">
                            <td class="px-6 py-4 whitespace-nowrap">{{ $task->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $task->task }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $task->begindate}}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $task->enddate }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $task->project->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $task->user->name }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                {{ optional($task->activity)->name }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">Details</td>
{{--                            @can('edit task')--}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-4 text-sm">
{{--                                        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}">Edit</a>--}}
                                        <a >Edit</a>
                                    </div>
                                </td>
{{--                            @endcan--}}
{{--                            @can('delete task')--}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center space-x-4 text-sm">
                                        <a>Delete</a>
{{--                                        <a href="{{ route('tasks.delete', ['task' => $task->id]) }}">Delete</a>--}}
                                    </div>
                                </td>
{{--                            @endcan--}}
                        </tr>
                    @endforeach
{{--                @endcan--}}
                </tbody>
            </table>

            <div class="container max-w-4xl mx-auto pb-100 flex justify-between items-center px-3">
                <div class="text-xs">
                    {{ $tasks->links() }}
                </div>
        </div>
    </div>
@endsection


