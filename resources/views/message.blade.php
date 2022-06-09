@extends('layouts.main')
@section('page_title')
    KirimPesan : {{$user->name}}
@endsection

@php
    $myDashboard = false;
    $dashboardMode = false;
    if (Auth::check()) {
        $myDashboard = Auth::user()->id == $user->id;
        $dashboardMode = 1 == request()->get("admin") && $myDashboard;
    }
@endphp

@section('main_container')
@includeWhen($dashboardMode, 'partials.dialogSystem')
@include('partials.alertingSystem')
@include('partials.profile')
@includeUnless($myDashboard,'partials.message.send' )

<div class="message-received mx-1">
    @if ($user->messages->where('isHidden',0)->count())
        <h4 class="text-center">Pesan Untuk {{$user->name}}</h4>
        @includeWhen($user->messages->where('isPinned',1)->count(),'partials.message.pinned')
        @includeWhen($user->messages->where('isHidden',0)->where('isPinned',0)->count(),'partials.message.unpinned')
    @else
        <div class="alert alert-info" style="z-index: -99" role="alert">
            Tidak ada Pesan untuk ditampilkan
        </div>
    @endif

    @includeWhen($user->messages->where('isHidden',1)->count() && $dashboardMode,'partials.message.hidden')
</div>
      	
@include('partials.markdownDecode')  
@endsection
@section('add_script')
    @include("partials.dialog.script") 
@endsection