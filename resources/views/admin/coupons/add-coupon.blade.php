@extends('template_admin')
@section('content-admin')
<main class="h-full pb-16 overflow-y-auto">
    <div class="container px-6 mx-auto grid">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Coupons
        </h2>
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Create Coupons
        </h4>
        <div style="margin-bottom: 15px;" class="mt-4 text-sm">
            <a href="/coupon-table">
                <button
                    class="px-4  py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                    Back to coupon table
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

        <form action="{{route('coupon.add')}}" method="POST">
            @csrf
            <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Code</span>
                    <input
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="code" value="{{old('code')}}" />
                        <span style="color: red;">
                             @if($errors->has('code'))       
                                {{ $errors->first('code')}}
                            @endif
                        </span>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Discount</span>
                    <input type="number" min="1" value="{{old('discount')}}"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="discount" />
                        <span style="color: red;">
                             @if($errors->has('discount'))       
                                {{ $errors->first('discount')}}
                            @endif
                        </span>
                </label>
                <label class="block text-sm">
                    <span class="text-gray-700 dark:text-gray-400">Expiration Time</span>
                    <input type="date"
                        class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input"
                        name="expiration_time" value="{{old('expiration_time')}}" />
                        <span style="color: red;">
                             @if($errors->has('expiration_time'))       
                                {{ $errors->first('expiration_time')}}
                            @endif
                        </span>
                </label>

                <div class="mt-4 text-sm">
                    <button type="submit"
                        class="px-4  py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                        Add Coupon
                    </button>
                </div>
        </form>
    </div>
    </div>
</main>
@endsection