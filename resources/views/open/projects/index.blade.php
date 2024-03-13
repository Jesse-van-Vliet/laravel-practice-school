@extends('layouts.layoutpublic')

@section('content')
    <div class="w-full px-6 py-12 bg-gray-100 border-t">
        <div class="container max-w-4xl mx-auto pb-10 flex flex-wrap">
            @foreach($projects as $project)
                <div class="w-full sm:w-1/2 md:w-1/3 lg:w-1/4 p-3 mb-4">
                    <a href="#">
                        <img src="https://cdn.discordapp.com/attachments/1039845380738781227/1217397167883423795/IMG-20221225-WA0000.jpg?ex=6603e076&is=65f16b76&hm=85fe4fa07a2357b89307a5954e67173a79ee73339666d6a8123a73eff5a3cc53&" class="w-full rounded lg"   />
                    </a>


                    <h2 class="text-xl py-4">
                        <a href="#" class="text-black no-underline">Id: {{ $project->id }}</a>
                    </h2>

                    <h2 class="text-xl py-4">
                        <a href="#" class="text-black no-underline">Name: {{ $project->name }}</a>
                    </h2>

                    <p class="text-xl py-4">Description: {{ $project->description }}</p>



                </div>

            @endforeach
        </div>

        <div class="container max-w-4xl mx-auto pb-10 flex justify-between items-counter px-3">
            <div class="text-xs">
                {{ $projects->links()}}

            </div>

        </div>

    </div>
@endsection
