<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Business') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                   <h3 class="font-semibold pb-5">Edit business: {{$business->business_name}}</h3>

                    <form action="{{route('business.update', $business->id)}}" method="POST">
                        @csrf
                        @method('PUT')

                        @if ($errors->any())
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{$error}}</>
                                @endforeach
                            </ul>
                        @endif

                        <div class="grid grid-cols-1 sm:grid-cols-6 gap-x-6 gap-y-6">
                            <span class="sm:col-span-3">
                                <label class="block" for="business_name">Business name</label>
                                <input class="block w-full" type="text" name="business_name" id="business_name" value="{{old('business_name', $business->business_name)}}">
                            </span>
                            <span class="sm:col-span-3">
                                <label class="block" for="contact_email">contact_email</label>
                                <input class="block w-full" type="text" name="contact_email" id="contact_email" value="{{old('contact_email', $business->contact_email)}}">
                            </span>
                        </div>

                        <h4 class="font-semibold pt-5">Tags</h4>
                        <div class="grid grid-cols-1 sm:grid-cols-12 gap-x-6 gap-y-6">
                            @foreach ($tags as $tag)
                                <span class="sm:col-span-2">
                                    <input type="checkbox" id="tag{{$tag->id}}" name="tags[]" value="{{$tag->id}}" @checked(in_array($tag->tag_name, $business->tags->pluck('tag_name')->toArray()))>
                                    <label for="tag{{$tag->id}}"> {{$tag->tag_name}}</label>
                                </span>
                            @endforeach
                        </div>
                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <a href="{{route('business.index')}}">Cancel</a>
                            <button class="bg-blue-600 text-white py-2 px-3 rounded-full" type="submit">Save</button>
                        </div>

                    </form>

                    <form action="{{route('business.destroy', $business->id)}}" method="POST">
                        @csrf
                        @method('DELETE')

                        <div class="border bg-red-600 text-white mt-6 p-6">
                            <h3 class="font-semibold">Danger zone</h3>
                            <p>You can delete this business here</p>
                            <button type="submit">Delete</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
