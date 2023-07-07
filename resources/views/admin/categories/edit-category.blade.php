@extends('template_admin')
@section('content-admin')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Category
        </h2>

        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Edit category
        </h4>
        <div style="margin-bottom: 15px;" class="mt-4 text-sm">
            <a href="/category-table">
                <button
                    class="px-4  py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Back to category table
                </button>
            </a>
        </div>
        <form action="{{route('category.update',['id'=>$category->id])}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
            <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">ID</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="name" value="{{$category->id}}" disabled />
                </label>
            <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Name</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="name" value="{{$category->name}}" />
                </label>
                <div class="mt-4 text-sm">
                    <label class="block text-sm">
                        <span class="text-gray-700 dark:text-gray-400">Description</span>
                        <textarea
                            class=" block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                            name="description" rows="5">{{$category->description}}
               </textarea>
                    </label>
                </div>
                <div class="mt-4 text-sm">
                    <button type="submit"
                        class="px-4  py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Update category
                    </button>
                </div>
        </form>
    </div>
    </div>
</main>
@endsection