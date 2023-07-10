@extends('template_admin')
@section('content-admin')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tables
        </h2>
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            All Bills Is Here !!!
        </h4>
        @if(Session::has('success'))
        <script>
        alert("{{Session::get('success')}}");
        </script>
        @endif
        <div style="margin-bottom: 15px">
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3">Name</th>
                            <th class="px-4 py-3">Email</th>
                            <th class="px-4 py-3">Address</th>
                            <th class="px-4 py-3">Phone</th>
                            <th class="px-4 py-3">Total</th>
                            <th class="px-4 py-3">Pttt</th>
                            <th class="px-4 py-3">Status</th>
                            <th class="px-4 py-3">Cart_id</th>
                            <th class="px-4 py-3">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($bills as $bill)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{$bill->id}}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <p class="textt">{{$bill->name}}</p>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <p class="text-name">{{$bill->email}}</p>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <p class="text-name">{{$bill->address}}</p>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$bill->phone}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                ${{$bill->total}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$bill->pttt}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                {{$bill->status_bill}}
                            </td>
                            <td class="px-4 py-3 text-sm">
                                @php
                                $cartItems = json_decode($bill->cart_id);
                                $cartString = implode(', ', $cartItems);
                                @endphp
                               <p class="textt">{{$cartString}}</p>
                            </td>
                            <td class="px-4 py-3">
                                <div class="flex items-center space-x-4 text-sm">
                                    <a href="{{route('bill.edit',['id'=>$bill->id])}}">
                                        <button type="submit"
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Edit">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </button>
                                    </a>
                                    <form action="{{route('bill.delete',['id'=>$bill->id])}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button
                                            class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray"
                                            aria-label="Delete">
                                            <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div
                class="grid px-4 py-3 text-xs font-semibold tracking-wide text-gray-500 uppercase border-t dark:border-gray-700 bg-gray-50 sm:grid-cols-9 dark:text-gray-400 dark:bg-gray-800">
                <span class="flex items-center col-span-3">
                    Showing 21-30 of 100
                </span>
                <span class="col-span-2"></span>
                <!-- Pagination -->
                <span class="flex col-span-4 mt-2 sm:mt-auto sm:justify-end">
                  <nav aria-label="Table navigation">
                    <ul class="inline-flex items-center">
                          {{$bills->links()}}
                    </ul>
                  </nav>
                </span>
            </div>
        </div>
    </div>
</main>
<script>
function importCSS(url) {
    var link = document.createElement("link");
    link.rel = "stylesheet";
    link.href = url;
    document.getElementsByTagName("head")[0].appendChild(link);
}
importCSS("assets/css/textcontent.css");
</script>
@endsection