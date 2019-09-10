<div class="tab-pane fade" id="v-pills-timeline" role="tabpanel" aria-labelledby="v-pills-timeline-tab">

    <div class="row">
        <div class="col-md-6">
            <label><b>Profile created</b></label>
        </div>
        <div class="col-md-6">
            <p>{{Auth::user()->created_at->diffForHumans()}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label><b>Last visit</b></label>
        </div>
        <div class="col-md-6">
            @if(Auth::user()->updated_at)
                <p>{{Auth::user()->updated_at->diffForHumans()}}</p>
            @else
                <p>n/a</p>
            @endif
        </div>
    </div>
    <div class="row">
        <h2 class="w-100">Actions</h2>
        <div class="col-md-6">
            <label><b>List actions</b></label>
        </div>
        <div class="col-md-6">
            <p>Added recrutation</p>
        </div>
    </div>

</div>
