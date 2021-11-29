<div>
    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form wire:submit.prevent="submit" enctype="multipart/form-data" class="pt-3">

        <div class="flex flex-wrap -m-2">
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2 {{ $errors->has('product.code') ? 'is-invalid' : '' }}">
                <x-label for="product_code" :value="__('Code')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="text" name="product_code" id="product_code" required wire:model.defer="product.code">
                <x-input-error for="product.code" />
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2 {{ $errors->has('product.category') ? 'is-invalid' : '' }}">
                <x-label for="product_category" :value="__('Category')" />
                <select wire:model.defer="product.category"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    name="product_category">
                    <option value="">{{ __('Select Category') }}</option>
                    <option value='{{ App\Models\Product::CAT_HOT }}'>{{ __('Hot') }}</option>
                    <option value='{{ App\Models\Product::CAT_NEW }}'>{{ __('New') }}</option>
                    <option value='{{ App\Models\Product::CAT_SALE }}'>{{ __('Sale') }}</option>
                </select>
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2 {{ $errors->has('product.name') ? 'is-invalid' : '' }}">
                <x-label for="product_name" :value="__('Name')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="text" name="product_name" id="product_name" required wire:model.defer="product.name">
                <x-input-error for="product.name" />
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2 {{ $errors->has('product.') ? 'is-invalid' : '' }}">
                <x-label for="product_price" :value="__('Price')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="number" name="product_price" id="product_price" required wire:model="product.price">
                <x-input-error for="product.price" />
            </div>
            <div class="lg:w-1/3 md:w-1/2 sm:w-full p-2">
                <x-label for="product_wholesale_price" :value="__('Wholesale Price')" required />
                <input
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    type="number" name="wholesale_price" id="wholesale_price" wire:model="product.wholesale_price">
                <x-input-error for="product.wholesale_price" />
            </div>
        </div>

        <div class="mb-4 p-2 flex flex-wrap {{ $errors->has('image') ? 'is-invalid' : '' }}">
            <div class="my-2 lg:w-1/2 sm:w-full">
                @if ($image != null)
                    <img src="{{ asset('uploads/' . $image) }}" id="image" style="width: 150px; height: 150px;">
                @else
                    <img src="https://via.placeholder.com/250x200?text=Placeholder+Image" id="logoImg"
                        style="width: 150px; height: 150px;">
                @endif
            </div>
            <div class="my-2 lg:w-1/2 sm:w-full">
                <x-label for="image" :value="__('Image')" />
                <input type="file"
                    class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                    id="image" wire:model="image">
                <x-input-error for="image" />
            </div>
        </div>

        <div class="mb-4 p-2 {{ $errors->has('product.description') ? 'is-invalid' : '' }}">
            <x-label for="product_description" :value="__('Description')" />
            <input
                class="p-3 leading-5 bg-white dark:bg-dark-eval-2 text-gray-700 dark:text-gray-300 rounded border border-gray-300 mb-1 text-sm w-full focus:shadow-outline-blue focus:border-blue-500"
                type="text" name="product_description" id="product_description" wire:model.defer="product.description">
            <x-input-error for="product.description" />
        </div>

        <div class="w-full p-2">
            <button
                class="leading-4 md:text-sm sm:text-xs bg-blue-900 text-white hover:text-blue-800 hover:bg-blue-100 active:bg-blue-200 focus:ring-blue-300 font-medium uppercase px-6 py-2 rounded-md shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                type="submit">
                {{ __('Save') }}
            </button>
            <a href="{{ route('vendor.products.index') }}"
                class="btn rounded-md text-sm font-medium border-0 focus:outline-none focus:ring transition bg-gray-300 text-black hover:text-blue-800 hover:bg-blue-200 active:bg-blue-200 focus:ring-blue-300">
                {{ __('Go back') }}
            </a>
        </div>
    </form>
</div>
