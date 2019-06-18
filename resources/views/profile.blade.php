@extends('layouts.root')

@section('meta_title')
    Profile
@stop

@section('meta_description')
    Profile
@stop


@section('content')
    <section>

        <div class="container emp-profile">

                <div class="row">
                    <div class="col-md-3">
                        <div class="profile-img">
                            <img class="w-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary w-100">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="profile-head">
                            <h5>
                                {{Auth::user()->first_name.' '.Auth::user()->last_name}}
                            </h5>
                            <h6>
                                {!!Auth::user()->position_name??'<p class="text-secondary">Position name<p>'!!}
                            </h6>
                            <p class="proile-rating">RANKINGS : <span>{!!Auth::user()->ranking ? Auth::user()->ranking .'/10':'<span class="text-secondary">Not rated yet<span>'!!}</span></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2">
{{--                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>--}}

                        <div id="modal-edit">
                            <b-button id="show-btn" @click="$bvModal.show('bv-modal-example')">Edit Profile</b-button>

                            <b-modal id="bv-modal-example" hide-footer>
                                <template slot="modal-title">
                                    Edit profile
                                </template>

                                <div class="d-block text-left">

                                    <b-form data="{{ Auth::user() }}" @submit="" @reset="" v-if="">
                                        @csrf
                                        <!-- Default input first name -->
                                        <label for="defaultFormCardNameEx" class="grey-text font-weight-light">First name</label>
                                        <b-form-input type="text" id="defaultFormCardNameEx" class="form-control"
                                                      value={{Auth::user()->first_name}}
                                                      placeholder="Enter your First Name"
                                         ></b-form-input>
                                        <br>
                                        <!-- Default input last name -->
                                        <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Last name</label>
                                        <b-form-input type="text" id="defaultFormCardNameEx" class="form-control"
                                                      value="{{Auth::user()->last_name}}"
                                                      placeholder="Enter your First Name"
                                        ></b-form-input>
                                        <br>
                                        <!-- input email -->
                                        <label for="defaultFormCardEmailEx" class="grey-text font-weight-light">Your email</label>
                                        <b-form-input type="email" id="defaultFormCardEmailEx" class="form-control"
                                                      value="{{Auth::user()->email}}">
                                        </b-form-input>
                                        <br>
                                        <!-- Position -->
                                        <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Profession</label>
                                        <b-form-input type="text" id="defaultFormCardNameEx" class="form-control"
                                                      value="{{Auth::user()->position_name}}"
                                                      placeholder="Enter your First Name"
                                        ></b-form-input>
                                        <br>
                                        <!-- Company -->
                                        <label for="defaultFormCardNameEx" class="grey-text font-weight-light">Company name</label>
                                        <b-form-input type="text" id="defaultFormCardNameEx" class="form-control"
                                                      value="{{Auth::user()->company}}"
                                                      placeholder="Enter your First Name"
                                        ></b-form-input>
                                        <br>
                                        <b-form-select
                                                class="mb-2 mr-sm-2 mb-sm-0"
{{--                                                :value="{{Auth::user()->country}}"--}}
                                                :value="2"
                                                :options="{ '1': 'Russia', '2': 'Poland', '3': 'Germany' }"
                                                id="inline-form-custom-select-pref"
                                        >
                                            <option slot="first" :value="null">Choose country</option>
                                        </b-form-select>
                                        <br>


                                        <div class="text-center py-4 mt-3">
                                            <b-button type="submit" variant="primary">Submit</b-button>
{{--                                            <button class="btn btn-outline-purple" type="submit">Send<i class="far fa-paper-plane ml-2"></i></button>--}}
                                        </div>
                                    </b-form>



                                </div>
                                <b-button class="mt-3" block @click="$bvModal.hide('bv-modal-example')">Close</b-button>
                            </b-modal>
                        </div>


                    </div>


                </div>
                <div class="row">
                    <div class="col-md-3">
                        <div class="profile-work mt-4">
                            <p>WORK LINK</p>
                            {!!Auth::user()->website ?'<a href="'.Auth::user()->website.'""<a>Website Link</a><br/>':''!!}
                            {!!Auth::user()->facebook ?'<a href="'.Auth::user()->facebook.'""<a>Facebook Link</a><br/>':''!!}
                            {!!Auth::user()->linkedin ?'<a href="'.Auth::user()->website.'""<a>Linkedin Link</a><br/>':''!!}
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
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
                                        <p>{{Auth::user()->country}}</p>
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
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Profile created</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->created_at}}</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Last visit</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>{{Auth::user()->updated_at}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

        </div>
    </section>

@stop
{{--<script src="{{ asset('js/app.js') }}"></script>--}}





<script>
    export default {

        props: ['data'],
        computed: {
            items: function () {
                 console.log(this.data)
                return JSON.parse(this.data)
            }
        },
        data() {
            return {


                // show: true
            }
        },
        methods: {
            onSubmit(evt) {
                evt.preventDefault()
                alert(JSON.stringify(this.form))
            },
            onReset(evt) {
                evt.preventDefault()
                // Reset our form values
                this.form.email = ''
                this.form.name = ''
                this.form.food = null
                this.form.checked = []
                // Trick to reset/clear native browser form validation state
                this.show = false
                this.$nextTick(() => {
                    this.show = true
                })
            }
        }
    }
</script>


