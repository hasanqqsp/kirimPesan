@extends('layouts.main')
@section('page_title')
Sebuah Pesan Untuk {{$message->user->name}}
@endsection
@php
    $user = $message->user;
    $myDashboard = false;
    $dashboardMode = false;
    if (Auth::check()) {
        $myDashboard = Auth::user()->id == $user->id;
        $dashboardMode = 1 == request()->get("admin") && $myDashboard;
    }
@endphp
@section('main_container')
    @include('partials.alertingSystem')
    @includeWhen($dashboardMode, 'partials.dialog.deleteConfirm')

    <div>
    <a href="/{{$user->id}}">&laquo; Kembali</a>
        <h4 class="text-center">Sebuah Pesan Untuk {{$message->user->name}}</h4>
        @if ($message->isPinned)
            <h5><em><small>Pesan ini disematkan</small></em></h5>
        @endif
        @if ($message->isHidden)
            <h5><em><small>Pesan ini disembunyikan</small></em></h5>
        @endif
        
        <div @class([
            "border-primary" => !$message->isHidden && !$message->isPinned,
            "border-success" => !$message->isHidden && $message->isPinned,
            "border-secondary" => $message->isHidden && !$message->isPinned,
            "border border-2 rounded p-2 mt-3 mb-1" => true
            ]) >
            @include('partials.message.text')
            @if ($dashboardMode)
                <hr @class([
                    "bg-primary" => !$message->isHidden && !$message->isPinned,
                    "color-primary" => !$message->isHidden && !$message->isPinned,
                    "bg-success" => !$message->isHidden && $message->isPinned,
                    "color-success" => !$message->isHidden && $message->isPinned,
                    "bg-secondary" => $message->isHidden && !$message->isPinned,
                    "color-secondary" => $message->isHidden && !$message->isPinned,
                    "mt-3 mb-1" => true
                    ]) >

                <div class="w-100 d-flex justify-content-end align-items-center">
                    @include('partials.actionButton') 
                </div>
            @endif
        </div>
        @include('partials.reply.sendReply')
    @include('partials.reply.reply')
    @include('partials.markdownDecode')
@endsection

@section('add_script')
    <script>
        const toastElList = document.querySelectorAll('.toast')
        const toastList = [...toastElList].map(toastEl => {
                const toast = new bootstrap.Toast(toastEl)
                return toast
        })
    </script>
    @if ($dashboardMode)
        <script>
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            const tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
            const deleteModal = document.getElementById('deleteConfirmModal')
            deleteModal.addEventListener('show.bs.modal', event => {
                
                const button = event.relatedTarget
                
                const actionLink = button.getAttribute('data-bs-action')
                const form = deleteModal.querySelector('.modal-footer form')
                form.action = actionLink
                console.log(form)
            })
        </script>
    @endif
@endsection