@extends('template_admin')
@section('content-admin')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Product
        </h2>

        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Create product
        </h4>
        <div style="margin-bottom: 15px;" class="mt-4 text-sm">
            <a href="/product-table">
                <button
                    class="px-4  py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Back to product table
                </button>
            </a>
        </div>
        @if (session('success'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg></div>
                <div>
                    <p class="font-bold">Our privacy policy has changed</p>
                    <p class="text-sm">{{ session('success') }}</p>
                </div>
            </div>
        </div>
        <br>
        @elseif (session('error'))
        <div class="bg-teal-100 border-t-4 border-teal-500 rounded-b text-teal-900 px-4 py-3 shadow-md" role="alert">
            <div class="flex">
                <div class="py-1"><svg class="fill-current h-6 w-6 text-teal-500 mr-4"
                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path
                            d="M2.93 17.07A10 10 0 1 1 17.07 2.93 10 10 0 0 1 2.93 17.07zm12.73-1.41A8 8 0 1 0 4.34 4.34a8 8 0 0 0 11.32 11.32zM9 11V9h2v6H9v-4zm0-6h2v2H9V5z" />
                    </svg></div>
                <div>
                    <p class="font-bold">Our privacy policy has changed</p>
                    <p class="text-sm">{{ session('error') }}</p>
                </div>
            </div>
        </div>
        <br>
        @endif
        <form action="{{route('addProduct')}}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="name" value="{{old('name')}}"/>
                        <span style="color: red;">
                             @if($errors->has('name'))       
                                {{ $errors->first('name')}}
                            @endif
                        </span>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Amount</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="amount" value="{{old('amount')}}"/>
                        <span style="color: red;">
                             @if($errors->has('amount'))       
                                {{ $errors->first('amount')}}
                            @endif
                        </span>
                </label>
                <div class="mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Description</span>
                        <textarea
                            class=" block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="description" rows="5">
                            {{old('descriptioen')}}
                        </textarea>
                        <span style="color: red;">
                             @if($errors->has('description'))       
                                {{ $errors->first('description')}}
                            @endif
                        </span>
                    </label>
                </div>
                <div class="mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Price</span>
                        <input type="number" min="1"
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="price"  value="{{old('price')}}"/>
                            <span style="color: red;">
                             @if($errors->has('price'))       
                                {{ $errors->first('price')}}
                            @endif
                        </span>
                    </label>
                </div>
                <div class="mt-4 text-sm">
                    <!--action là uri tạo dữ liệu mới -->
                   <form action="/createproduct" enctype="multipart/form-data" method="POST">
                   <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Images</span>
                        <input type="file" multiple
                            class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="images" />
                            <span style="color: red;">
                             @if($errors->has('images'))       
                                {{ $errors->first('images')}}
                            @endif
                        </span>
                    </label>
                   </form>
                </div>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Author
                    </span>
                    
                    <select name="author_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option>--Choice Author--</option>
                        @foreach($authors as $au)
                        <option value="{{$au->id}}">{{$au->name}}</option>
                        @endforeach
                    </select>
                    <span style="color: red;">
                             @if($errors->has('author_id'))       
                                {{ $errors->first('author_id')}}
                            @endif
                        </span>
                </label>
                <label class="block mt-4 text-sm">
                    <span class="text-gray-700 dark:text-gray-400">
                        Category
                    </span>
                    <select name="category_id"
                        class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-select focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                        <option>--Choice Category--</option>
                        @foreach($categories as $cat)
                        <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                    <span style="color: red;">
                             @if($errors->has('category_id'))       
                                {{ $errors->first('category_id')}}
                            @endif
                        </span>
                </label>
                <div class="mt-4 text-sm">
                    <button type="submit"
                        class="px-4  py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Add product
                    </button>
                </div>

        </form>
    </div>
    </div>
</main>
@endsection