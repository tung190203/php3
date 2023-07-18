@extends('template_admin')
@section('content-admin')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Product
        </h2>

        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Edit product
        </h4>
        <div style="margin-bottom: 15px;" class="mt-4 text-sm">
            <a href="/product-table">
                <button
                    class="px-4  py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Back to product table
                </button>
            </a>
        </div>
        <form action="{{route('product.update',['id'=>$product->id])}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PATCH')
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="name" value="{{$product->name}}" />
                        
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Amount</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="amount" value="{{$product->amount}}" />
                </label>
                <div class="mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Description</span>
                        <textarea
                            class=" block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="description" rows="5">{{$product->description}}

               </textarea>
                    </label>
                </div>
                <div class="mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Price</span>
                        <input type="number" min="1"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="price" value="{{$product->price}}" />
                    </label>
                </div>
                <div class="mt-4 text-sm">
                    <!--action là uri tạo dữ liệu mới -->
                    <form action="/createproduct" enctype="multipart/form-data" method="POST">
                        <label class="block text-sm">
                            <span class="text-gray-700 dark:text-gray-400">Images</span>
                            <img width="100px" src="uploads/{{$product->images}}" alt="">
                            <input type="file" multiple
                                class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                                name="images" />
                        </label>
                    </form>
                </div>
                <div class="mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Gender
                    </span>
                    @if($product->gender== 'Male'){
                        <div class="mt-2">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input type="radio"
                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="gender" value="Male" checked />
                            <span class="ml-2">Male</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio"
                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="gender" value="Female" />
                            <span class="ml-2">Female</span>
                        </label>
                    </div>
                    }
                    @else{
                        <div class="mt-2">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400">
                            <input type="radio"
                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="gender" value="Male"/>
                            <span class="ml-2">Male</span>
                        </label>
                        <label class="inline-flex items-center ml-6 text-gray-600 dark:text-gray-400">
                            <input type="radio"
                                class="text-purple-600 form-radio focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="gender" value="Female" checked/>
                            <span class="ml-2">Female</span>
                        </label>
                    </div>
                    }
                   @endif
                </div>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Brand
                    </span>
                    <select name="brand_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option value="{{$product->brand->id}}">{{$product->brand->brand_name}}</option>
                        @foreach($brand as $br)
                        <option value="{{$br->id}}">{{$br->brand_name}}</option> 
                        @endforeach
                    </select>

                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Category
                    </span>
                    <select name="category_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        
                        <option value="{{$product->category->id}}">{{$product->category->name}}</option>
                        @foreach($category as $ct)
                        <option value="{{$ct->id}}">{{$ct->name}}</option> 
                        @endforeach
                    </select>
                </label>
                <div class="mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Size
                    </span>
                    <div class="mt-2">
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400" style="margin-right: 50px;">
                            <input type="checkbox"
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="size[]" value="S" />
                            <span class="ml-2">S</span>
                        </label>
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400" style="margin-right: 50px;">
                            <input type="checkbox"
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="size[]" value="M"/>
                            <span class="ml-2">M</span>
                        </label>
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400" style="margin-right: 50px;">
                            <input type="checkbox"
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="size[]" value="L" />
                            <span class="ml-2">L</span>
                        </label>
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400" style="margin-right: 50px;">
                            <input type="checkbox"
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="size[]" value="XL" />
                            <span class="ml-2">XL</span>
                        </label>
                        <label class="inline-flex items-center text-gray-600 dark:text-gray-400" style="margin-right: 50px;">
                            <input type="checkbox"
                                class="text-purple-600 form-checkbox focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray"
                                name="size[]" value="XXL" />
                            <span class="ml-2">XXL</span>
                        </label>
                    </div>
                </div>
                <div class="mt-4 text-sm">
                    <button type="submit"
                        class="px-4  py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Update product
                    </button>
                </div>
        </form>
    </div>
    </div>
</main>
@endsection