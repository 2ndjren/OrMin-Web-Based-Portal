@extends('layout.admin.layout')
@section('feedbacks')
    <title>PRC ORMIN | User's Feedbacks</title>
    <div class="py-2 px-10">
        <p class="text-2xl text-green-600">Manage User's Feedback</p>
    </div>

    <div class="py-10 px-10 h-auto">
        <div class="bg-white rounded-md w-full overflow-x-auto p-5 space-y-2">
            <table id="feedback-table" class="stripe hover w-full h-auto">
                <thead>
                    <tr>
                        <th>Feedback</th>
                        <th>Sender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($feedback as $item)
                    <tr>
                        <td>{{ $item->message }}</td>
                        <td>{{ $item->u_id }}</td>
                        <td>
                            <button class="show-feedback-details-btn text-sm font-semibold bg-green-500 rounded-md text-white p-2" data-id="{{ $item->id }}">View</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div id="show-feedback-details-modal" class="fixed hidden inset-0 flex items-center justify-center z-10 bg-black bg-opacity-50 overflow-y-auto">
        <div class="modal-container bg-white sm:w-1/4 lg:w-1/4 rounded-lg shadow-lg mx-5">
            <div class="px-4 py-3">
                <p class="text-2xl text-center font-semibold text-green-500">Feedback's Overview</p>
            </div>
            <div id="feedback-details" class="block px-10 py-3"></div>
        </div>
    </div>
@endsection
