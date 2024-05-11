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

        @can('delete task')

        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <form id="form" class="shadow-md rouded-lg px-8 pt-6 pb-8 mb-4" action="{{ route('tasks.update', ['task'=> $task->id])  }}" method="POST">
                    @method('DELETE')
                    @csrf
                    <label class="block tex-sn">
                        <span class="text-gray-700">
                            task
                        </span>
                        <input class="bg-gray-200 block rounded w-full p-2 nt-2 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input" name="task" value="{{old('task', $task->task)}}" type="text" required disabled>
                        <span class="text-gray-700">
                            User
                        </span>
                        <input class="bg-gray-200 block rounded w-full p-2 nt-2 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input" name="task" value="{{old('task', $task->user->name)}}" type="text" required disabled>


                        <span class="text-gray-700">
                            project
                        </span>
                        <input class="bg-gray-200 block rounded w-full p-2 nt-2 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input" name="task" value="{{old('task', $task->project->name)}}" type="text" required disabled>

                        <span class="text-gray-700">
                            Activity
                        </span>
                        <input class="bg-gray-200 block rounded w-full p-2 nt-2 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input" name="task" value="{{old('task', $task->activity->name)}}" type="text" required disabled>




                        <span class="text-gray-700">
                            begin date
                        </span>
                        <input class="border-2 m-4" type="text" id="start" name="begindate" value="{{old('begindate', $task->begindate)}}" type="date" disabled />



                        <span class="text-gray-700">
                            end date
                        </span>
                        <input class="border-2 m-4" type="text" id="start" name="enddate" value="{{old('enddate', $task->enddate)}}" type="date"  disabled />

                    </label>

                    <button class="nt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        verwijderen
                    </button>

                </form>

                @endcan

            </div>
        </div>

    </div>
@endsection
