@extends('layouts.AdminLTE')

@section('content')
    <section class="content">
        <div class="row">
        <div class="col-md-12">
            <!-- The time line -->
            @foreach($notifications as $notification)
                <div class="timeline">
                    <div>
                        <i class="fas fa-bell bg-blue"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> {{ date( 'd/m/Y H:m:', strtotime($notification->created_at)) }}</span>
                            <h3 class="timeline-header"><a href="{{ route('mkt.registers.show', ['id' => $notification->id]) }}">{{ $notification->name }}</a> se cadastrou em uma nova campanha</h3>
                        </div>
                    </div>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                </div>
            @endforeach
{{ $notifications->links()  }}
        </div>
    </section>
@endsection
