<div class="tab-pane fade active show" id="v-pills-flow" role="tabpanel" aria-labelledby="v-pills-flow-tab">
    <div class="row">
        @if(Auth::user()->id)
            <table-component id="{{Auth::user()->id}}"></table-component>
        @else
            <p class="text-center">No recrutation flow currently available!</p>
        @endif
    </div>

</div>
