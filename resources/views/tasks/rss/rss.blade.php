<x-home>
    <x-slot name="title">
        {{ $title ?? null }}
    </x-slot>
    <div class="block mt-3">
        <h3 class="text-xl font-bold dark:text-white">
            {{ __('Rss') }} 
        </h3>

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
            <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-xs">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3 text-xs">
                            Action
                        </th>
                    </tr>
                </thead>

                
 
                <tbody>
                    @forelse($rsses as $index => $rss)
                        <tr
                            class="
                            @if($index%2 ==0)
                                bg-white dark:bg-gray-900  border-b dark:border-gray-700
                            @else
                                bg-gray-50 dark:bg-gray-800 border-b dark:border-gray-700
                            @endif
                        ">
                            <th scope="row" class="px-6 py-2 font-medium text-gray-900 whitespace-nowrap dark:text-white text-xs">
                                @if($rss->subscribed)
                                    <a href="{{ url('/tasks/rss/feed/' . $rss->channel ) }}" class="text-green-500"> >> {{ $rss->name }}</a>
                                
                                    {{-- <div id="rss_{{  $rss->id }}">
                                        <a href="{{ url('/tasks/rss/feed/' . $rss->channel ) }}" class="text-green-500"> >> {{ $rss->name }}</a>
                                    </div> --}}
                                @else
                                    {{ $rss->name }}
                                @endif
                            </th>
                            <td class="px-6 py-2 text-xs">
                                {{ $rss->subscribed ? 'Followed' : 'Not Followed'}}
                            </td>
                            <td class="px-6 py-2 text-xs">
                                <form method="post" action="{{route('tasks.rss.rss')}}">
                                    @csrf
                                    
                                    @if($rss->subscribed)
                                        <button type="submit" class="text-white bg-red-600 hover:bg-red-800  font-medium rounded-lg text-xs px-4 py-1.5 mr-2 mb-2">
                                            Unfollow
                                        </button>
                                    @else
                                        <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800   font-medium rounded-lg text-xs px-4 py-1.5 mr-2 mb-2">
                                            &nbsp;&nbsp;Follow&nbsp;&nbsp;
                                        </button>
                                    @endif
                
                                    <input id="rss" type="hidden" name="subscribed" value="{{ $rss->subscribed ? 0 : 1 }}" />
                                    <input type="hidden" name="id" value="{{ $rss->id }}" />                     
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-white dark:bg-gray-900  border-b dark:border-gray-700">
                            <td colspan="3" class="p-2 text-xs text-center">No records</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-home>