<div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
    Profile summary

    <profile-component
            :id="{{$id}}"
            :countries="{{\App\Country::get(['id','long_name'])}}"
    >

    </profile-component>
    {{--Vue component--}}
    <div class="mt-2 text-center">
        {{--<b-button id="show-btn" @click="$bvModal.show('bv-modal-example')">Edit Profile</b-button>--}}
        {{--<modal-component--}}
            {{--:data="{{ Auth::user()}}"--}}
            {{--:countries="{{\App\Country::get(['id','long_name'])}}"--}}
        {{--></modal-component>--}}
    </div>

    <div class="profile-work mt-4">
        <p>LINKS</p>
        {!!Auth::user()->website ?'<a href="'.Auth::user()->website.'">Website Link</a><br/>':''!!}
        {!!Auth::user()->facebook ?'<a href="'.Auth::user()->facebook.'">Facebook Link</a><br/>':''!!}
        {!!Auth::user()->linkedin ?'<a href="'.Auth::user()->website.'">Linkedin Link</a><br/>':''!!}
    </div>

    <p class="proile-rating">RANKINGS : <span>{!!Auth::user()->ranking ? Auth::user()->ranking .'/10':'<span class="text-secondary">Not rated yet<span>'!!}</span></p>

    <div class="row">
        <div class="col-md-6">
            <label>User Id</label>
        </div>
        <div class="col-md-6">
            <p>{{Auth::user()->id}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Name</label>
        </div>
        <div class="col-md-6">
            <p>{{Auth::user()->first_name.' '.Auth::user()->last_name}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Email</label>
        </div>
        <div class="col-md-6">
            <p>{{Auth::user()->email}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Phone</label>
        </div>
        <div class="col-md-6">
            <p>{{Auth::user()->phone}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Profession</label>
        </div>
        <div class="col-md-6">
            <p>{{Auth::user()->position_name}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Company</label>
        </div>
        <div class="col-md-6">
            <p>{{Auth::user()->company}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Country</label>
        </div>
        <div class="col-md-6">
            <p>{{Auth::user()->country->long_name}}</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <label>Active campanies</label>
        </div>
        <div class="col-md-6">
            <p>{{\App\Recruitment::where('user_id', Auth::user()->id)->count()}}</p>
        </div>
    </div>

</div>

