<div class="tab-pane fade active show" id="v-pills-flow" role="tabpanel" aria-labelledby="v-pills-flow-tab">
    <div class="row">
        @if(Auth::user()->id)
            <recrutation-component id="{{Auth::user()->id}}"></recrutation-component>
        @else
            <p class="text-center">No recrutation flow currently available!</p>
        @endif
    </div>

</div>
