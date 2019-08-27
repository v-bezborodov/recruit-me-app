<div class="tab-pane fade" id="v-pills-flow" role="tabpanel" aria-labelledby="v-pills-flow-tab">
    <div class="row">
        @if($recruitments->count())
            <table-component data="{{ $recruitments }}"></table-component>
        @else
            <p class="text-center">No recrutation flow currently available!</p>
        @endif
    </div>

</div>