<div class="col-md-3  col-sm-12 d-flex justify-content-center mt-3">
    <div class="card-columns">
        <div class="card-img-container">
            <img src="{{$item['card_img']}}" class="card-img-top img-fluid w-100 card-image" alt="Schedule Image">
        </div>
        <div class="card-body mt-2">
            <h3 class="card-title">{{$item['title']}}</h3>
            <div class="card-text mt-1">
                <p class="lead">{{$item['description']}}</p>
                <p class="mb-0 pb-1"><i class="bi bi-calendar-range fs-5"></i> {{$item['date']}}</p>
                <p class="mb-0"><i class="bi bi-alarm fs-5"></i> {{$item['time_schedule']}}</p>
            </div>
            <p class="text-muted mt-3 fs-6">
                <i class="bi bi-info-circle fs-5"></i> <em>{{$item['play_type']}}, {{$item['player_type']}}</em>
            </p>
            <button type="button" class="btn btn-warning w-100 font-weight-bold">JOIN</button>
        </div>
    </div>
</div>