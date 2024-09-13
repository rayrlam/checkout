<x-home>
    <div class="p-8 w-full bg-white rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
        <div class="flex" style="justify-content:space-between; align-items:baseline">
            <div class="font-bold lg:text-3xl text-2xl mt-4 mb-4">
                {{ __('Rss') }} 
            </div>
        </div>
        <div class="mt-4">
            <table id="items" style="margin:auto;margin-bottom:20px">
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                @forelse($rsses as $rss)
                <tr>
                    <td>
                        @if($rss->subscribed)
                        <div id="rss_{{  $rss->id }}">
                            <a href="{{ url('/tasks/rss/feed/' . $rss->channel ) }}" class="text-green-500"> >> {{ $rss->name }}</a>
                        </div>
                        @else
                            {{ $rss->name }}
                        @endif
                    </td>
                    <td>{{ $rss->subscribed ? 'Followed' : 'Not Followed'}}</td>
                    <td>
                        <form method="post" action="{{route('tasks.rss.rss')}}">
                            @csrf
                            
                            @if($rss->subscribed)
                                <button type="submit" class="text-white bg-red-600 hover:bg-red-800  font-medium rounded-lg text-sm px-10 py-2.5 mr-2 mb-2">
                                    Unfollow
                                </button>
                            @else
                                <button type="submit" class="text-white bg-blue-600 hover:bg-blue-800   font-medium rounded-lg text-sm px-10 py-2.5 mr-2 mb-2">
                                    &nbsp;&nbsp;Follow&nbsp;&nbsp;
                                </button>
                            @endif
        
                            <input id="rss" type="hidden" name="subscribed" value="{{ $rss->subscribed ? 0 : 1 }}" />
                            <input type="hidden" name="id" value="{{ $rss->id }}" />                     
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="text-center">No records</td>
                </tr>
                @endforelse
            </table>
        </div>
    </div>
</x-home>