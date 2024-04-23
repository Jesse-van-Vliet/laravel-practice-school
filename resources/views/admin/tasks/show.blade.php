@extends("layouts.layoutadmin")
@section("topmenu")
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
    <div class="card mt-6">
        {{--        header--}}
        <div class="card-header flex flex-row justify-between">
            <h1 class="h6">tasks Admin</h1>
        </div>
        {{--        end header--}}

        {{--        content--}}
        <div class="py-4 px-6">
            <h2 class="text-lg font-semibold text-gray-800 "> Project details </h2>
            @can('show task')

                <p class="py-2 text-lg text-gray-700">ID: {{$task->id}} </p>
                <p class="py-2 text-lg text-gray-700">Naam: {{$task->task}}</p>
                <p class="py-2 text-lg text-gray-700">begindate: {{$task->begindate}}
                @if($task->enddate)
                    <p class="py-2 text-lg text-gray-700">enddate: {{$task->enddate}}</p>
                @endif
                @if($task->user)
                    <p class="py-2 text-lg text-gray-700">begindate: {{$task->user->name}}</p>
                @endif
                <p class="py-2 text-lg text-gray-700">project name: {{$task->project->name}}</p>
                <p class="py-2 text-lg text-gray-700">activity: {{$task->activity->name}}</p>
                <p class="py-2 text-lg text-gray-700">Datum: {{$task->created_at}}</p>
                  </div>
        @endcan


    </div>
@endsection
