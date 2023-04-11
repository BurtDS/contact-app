<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Person') }} | {{$person->firstname}} {{$person->lastname}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid grid-cols-1 sm:grid-cols-6 gap-x-6 gap-y-6">
                        <div class="sm:col-span-3">
                            <h3 class="font-semibold text-l pb-5">Person Details</h3>
                            <dl>
                                <dt class="font-semibold">Name</dt>
                                <dd class="pl-3">{{$person->firstname}} {{$person->lastname}}</dd>
                                <dt class="font-semibold">Phone</dt>
                                <dd class="pl-3">{{$person->phone}}</dd>
                                <dt class="font-semibold">Email</dt>
                                <dd class="pl-3">{{$person->email}}</dd>
                                <dt class="font-semibold">Birthday</dt>
                                <dd class="pl-3">{{$person->birthday}}</dd>
                                <dt class="font-semibold">Tags</dt>
                                <dd class="pl-3">
                                    @foreach ($person->tags as $tag)
                                        <span class="bg-green-600 text-white text-xs px-1 rounded-full">{{$tag->tag_name}}</span>
                                    @endforeach
                                </dd>
                            </dl>

                            <div class="pt-3">
                                <a class="bg-blue-600 text-white py-2 px-3 rounded-full" href="{{route('person.edit', $person->id)}}">Edit Person</a>
                            </div>
                        </div>
                        <div class="sm:col-span-3">
                            <h3 class="font-semibold text-l pb-5">Create a new Task</h3>
                            <form action="{{ route('task.store') }}" method="POST">
                                @csrf
                                <input type="hidden" name="taskable_id" value="{{$person->id}}">
                                <input type="hidden" name="target_model" value="person">
                                <div class="grid grid-cols-1 sm:grid-cols-6 gap-x-6 gap-y-6">
                                    <span class="sm:col-span-6">
                                        <label class="block" for="title">Task title </label>
                                        <input class="block w-full" type="text" name="title" id="title" value="{{ old('title') }}">
                                    </span>
                                    <span class="sm:col-span-6">
                                        <label class="block" for="description">Task description</label>
                                        <textarea class="block w-full" type="text" name="description" id="description">{{ old('description') }}</textarea>
                                    </span>
                                </div>

                                <div class="mt-5 flex items-center justify-end gap-x-6">
                                    <button type="submit" class="flex items-center justify-end ml-2 bg-blue-600 text-white py-2 px-3 rounded-full">Create Task</button>
                                </div>
                            </form>

                            <h3 class="font-semibold text-l pb-5">Tasks</h3>
                            @foreach ($person->tasks->sortByDesc('created_at') as $task)
                                <div class="border-t border-grey-500 py-3">
                                    <h4 class="font-semibold">{{$task->title}}</h4>
                                    <p>{{$task->description}}</p>
                                    @if ($task->status == "open")
                                        <div class="pt-3">
                                            <form action="{{route('task.complete', $task->id)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <button class="bg-blue-600 text-white py-2 px-3 rounded-full" type="submit">Complete Task</button>
                                            </form>
                                        </div>
                                    @else
                                        <p class="italic">Completed</p>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
