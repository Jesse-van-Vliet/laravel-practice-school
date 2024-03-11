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
            <h1>Projecten admin</h1>
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

        <div class="card-body grid grid-cols-1 gap-6 lg:grid-cols-1">
            <div class="p-4">
                <form id="form" class="shadow-md rouded-lg px-8 pt-6 pb-8 mb-4" action="{{ route('projects.store')  }}" method="POST">
                    @csrf
                    <label class="block tex-sn">
                        <span class="text-gray-700">
                            name
                        </span>
                        <input class="bg-gray-200 block rounded w-full p-2 nt-2 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input" name="name" value="{{old('name')}}" type="text" required>
                        <span class="text-gray-700">
                            description
                        </span>
                        <input class="bg-gray-200 block rounded w-full p-2 nt-2 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple form-input" name="description" value="{{old('description')}}" type="text" required>


                    </label>

                    <button class="nt-2 px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                     toevoegen
                    </button>

                </form>

            </div>
        </div>

    </div>
@endsection
