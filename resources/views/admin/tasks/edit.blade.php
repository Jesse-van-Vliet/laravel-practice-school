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
    <div class="card nt-6">
        {{--        header --}}

        <div class="card-header">
            <h1>Projecten task</h1>
        </div>

        {{--        end headers --}}

        {{--        errors--}}

        @if($errors->any())
            <div class="bg-red-200 text-red-900 rounded-lg shadow-md p-6 pr-10 mb-8" style="...">
                <ul class="nt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>

            </div>
        @endif

        @can('edit task')

        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <form id="form" class="shadow-md rouded-lg px-8 pt-6 pb-8 mb-4" action="{{ route('tasks.update', ['task'=> $task->id])  }}" method="POST">
                    @method('PUT')
                    @csrf
                    <label class="block tex-sn">
                        <span class="text-gray-700">
                            task
                        </span>
                        <input class="bg-gray-200 block rounded w-full p-2 nt-2 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input" name="task" value="{{old('task', $task->task)}}" type="text" required>
                        <span class="text-gray-700">
                            User
                        </span>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="user_id" id="user_id">
                            @foreach($users as $user)
                                <option value="{{$user->id}}" @selected($user->id = old('user_id', $task->user_id))> {{ $user->name }}</option>
                            @endforeach


                        </select>


                        <span class="text-gray-700">
                            project
                        </span>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="project_id" id="project_id">
                            @foreach($project as $projects)
                                <option value="{{$projects->id}}" @selected($projects->id = old('user_id', $task->user_id))> {{ $projects->name }}</option>
                            @endforeach


                        </select>

                        <span class="text-gray-700">
                            Activity
                        </span>
                        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="activity_id" id="activity_id">
                            @foreach($activity as $activities)
                                <option value="{{$activities->id}}" @selected($activities->id = old('activity_id', $task->activity_id))> {{ $activities->name }}</option>
                            @endforeach


                        </select>




                        <span class="text-gray-700">
                            begin date
                        </span>
                        <input class="border-2 m-4" type="date" id="start" name="begindate" value="{{old('begindate', $task->begindate)}}" type="date" />



                        <span class="text-gray-700">
                            end date
                        </span>
                        <input class="border-2 m-4" type="date" id="start" name="enddate" value="@selected(old('enddate', $task->enddate))" />

                    </label>

                    <button class="nt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        weizigen
                    </button>

                </form>

                @endcan

            </div>
        </div>

    </div>
@endsection
