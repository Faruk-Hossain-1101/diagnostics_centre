@extends('layouts.admin.admin')
@section('title')
    Dashboard | Lab-Tests
@endsection
@section('content')
<div class="w-full overflow-hidden rounded-lg shadow-xs">
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

    <div class="w-full overflow-x-auto">
      <table class="w-full whitespace-no-wrap">
        <thead>
          <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
            <th class="px-4 py-3">#SL.NO</th>
            <th class="px-4 py-3">Name</th>
            <th class="px-4 py-3">Group</th>
            <th class="px-4 py-3">Price</th>
            <th class="w-32 px-4 py-3 ">Actions</th>
          </tr>
        </thead>
        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
            @foreach ($tests as $test)
            <tr class="text-gray-700 dark:text-gray-400">
                <td class="px-4 py-3"> {{ $loop->iteration }}</td>
                <td class="px-4 py-3 text-sm">{{ $test->name }}</td>
                <td class="px-4 py-3 text-sm">{{ $test->group->name }}</td>
                <td class="px-4 py-3 text-xs"> {{ $test->price }}</td>
                <td class="w-32 px-4 py-3 text-sm "> 
                  <div class="flex space-x-2 justify-between">
                    <a href="{{ route('test.edit', ['id'=>$test->id]) }}"
                    class="flex items-center  px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-full active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" aria-label="Edit">
                        <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
                        </svg>
                      </a>
                    <form action="{{ route('test.destroy', ['id'=>$test->id]) }}" id="deleteForm_{{ $test->id }}" method="POST">
                      @method("DELETE")
                      @csrf
                    </form>
                    <a onclick="event.preventDefault();document.getElementById('deleteForm_{{ $test->id }}').submit();" 
                    href="{{ route('test.destroy', ['id'=>$test->id]) }}"
                    class="flex items-center  px-2 py-2 text-sm font-medium leading-5 text-white transition-colors duration-150 bg-red-600 border border-transparent rounded-full active:bg-red-600 hover:bg-red-700 focus:outline-none focus:shadow-outline-red" aria-label="Edit">
                      <svg class="w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M6 2a1 1 0 00-1 1v1H3a1 1 0 100 2h14a1 1 0 100-2h-2V3a1 1 0 00-1-1H6zm2 5a1 1 0 00-2 0v9a1 1 0 002 0V7zm6 0a1 1 0 10-2 0v9a1 1 0 002 0V7zm-3 0a1 1 0 00-2 0v9a1 1 0 002 0V7z"></path>
                      </svg>
                    </a>
                  </div>
                </td>
              </tr>
            @endforeach     
        </tbody>
      </table>
    </div>

    {{ $tests->links('admin.components.pagination') }}
  </div>
@endsection