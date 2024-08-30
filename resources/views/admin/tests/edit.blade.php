@extends('layouts.admin.admin')
@section('title')
    Dashboard | Test-Create
@endsection
@section('content')
<div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md dark:bg-gray-800">
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    @if(session('error'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    @endif

    <form action="{{ route('test.update', ['id'=> $test->id]) }}" method="POST" >
        @method('PUT')
        @csrf
        <!-- Invalid input -->
        <label class="block text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Test Name
            </span>
            <input class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" 
                placeholder="Test Name"
                name="test_name" 
                required
                value="{{ $test->name }}"
                >
            @error('test_name')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{ $message }}
            </span>
            @enderror
            
        </label>

        <!-- Valid input -->
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Group
            </span>
            <select name="test_group"
            required
            class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 form-multiselect focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray">
                <option value="">-- Select a group --</option>
                    @foreach($groups as $group)
                    <option value="{{ $group->id }}" {{ $test->id == $group->id ? 'selected' : '' }}>{{ $group->name }}
                    </option>
                    @endforeach
            </select>
            @error('test_group')
            <span class="text-xs text-red-600 dark:text-red-400">
                {{ $message }}
            </span>
            @enderror
        </label>

        <!-- Helper text -->
        <label class="block mt-4 text-sm">
            <span class="text-gray-700 dark:text-gray-400">
                Price
            </span>
            <input class="block w-full mt-1 text-sm dark:text-gray-300 dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:focus:shadow-outline-gray form-input" 
                placeholder="Price"
                name="test_price"
                required
                type="text"
                onkeyup="this.value = this.value.replace(/[^0-9.]/g, '')"
                value="{{ $test->price }}"
                >
                @error('test_price')
                <span class="text-xs text-red-600 dark:text-red-400">
                    {{ $message }}
                </span>
                @enderror
        </label>

        <div class="mt-4">
            <button class="px-4 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">
                Submit
            </button>
        </div>
    </form>
</div>
@endsection