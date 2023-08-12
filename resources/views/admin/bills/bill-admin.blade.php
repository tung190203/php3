@extends('template_admin')
@section('content-admin')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tables
        </h2>
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Bills Detail
        </h4>
        <div style="margin-bottom: 15px">
            <a href="/bill-table">
                <button
                    class=" px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                     Back to bills
                </button>
            </a>
        </div>
        <div style="margin-bottom: 15px">
        </div>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">ID</th>
                            <th class="px-4 py-3"> Product Name</th>
                            <th class="px-4 py-3">Images</th>
                            <th class="px-4 py-3">Amount</th>
                            <th class="px-4 py-3">Size</th>
                            <th class="px-4 py-3">Total</th>
                           
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($cart as $ct)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3 text-sm">
                                {{$ct->id}}
                            </td>
                            <td class="px-4 py-3 text-xs">
                                <p >{{$ct->name}}</p>
                            </td>
                            <td class="px-4 py-3 text-xs"> 
                                <div class="relative hidden w-8 h-8 mr-3 rounded-full md:block">
                                <img class="object-cover w-full h-full rounded-full " src="uploads/{{$ct->images}}" alt="">    
                                </div>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <p>{{$ct->product_amount}} products</p>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                <p>{{$ct->product_size}}</p>
                            </td>
                            <td class="px-4 py-3 text-sm">
                                $ {{($ct->product_amount * $ct->price) +3}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
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