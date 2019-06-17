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
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-img">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS52y5aInsxSm31CvHOFHWujqUx_wWTS9iM6s7BAm21oEN_RiGoog" alt=""/>
                            <div class="file btn btn-lg btn-primary">
                                Change Photo
                                <input type="file" name="file"/>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
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
                        <input type="submit" class="profile-edit-btn" name="btnAddMore" value="Edit Profile"/>

                        <div id="modal-edit">
                            <b-button id="show-btn" @click="$bvModal.show('bv-modal-example')">Open Modal</b-button>

                            <b-modal id="bv-modal-example" hide-footer>
                                <template slot="modal-title">
                                    Using <code>$bvModal</code> Methods

                                    <b-form @submit="onSubmit" @reset="onReset" v-if="show">
                                        <b-form-group
                                                id="input-group-1"
                                                label="Email address:"
                                                label-for="input-1"
                                                description="We'll never share your email with anyone else."
                                        >
                                            <b-form-input
                                                    id="input-1"
                                                    v-model="form.email"
                                                    type="email"
                                                    required
                                                    placeholder="Enter email"
                                            ></b-form-input>
                                        </b-form-group>

                                        <b-form-group id="input-group-2" label="Your Name:" label-for="input-2">
                                            <b-form-input
                                                    id="input-2"
                                                    v-model="form.name"
                                                    required
                                                    placeholder="Enter name"
                                            ></b-form-input>
                                        </b-form-group>

                                        <b-form-group id="input-group-3" label="Food:" label-for="input-3">
                                            <b-form-select
                                                    id="input-3"
                                                    v-model="form.food"
                                                    :options="foods"
                                                    required
                                            ></b-form-select>
                                        </b-form-group>

                                        <b-form-group id="input-group-4">
                                            <b-form-checkbox-group v-model="form.checked" id="checkboxes-4">
                                                <b-form-checkbox value="me">Check me out</b-form-checkbox>
                                                <b-form-checkbox value="that">Check that out</b-form-checkbox>
                                            </b-form-checkbox-group>
                                        </b-form-group>

                                        <b-button type="submit" variant="primary">Submit</b-button>
                                        <b-button type="reset" variant="danger">Reset</b-button>
                                    </b-form>



                                </template>
                                <div class="d-block text-center">
                                    <h3>Hello From This Modal!</h3>
                                </div>
                                <b-button class="mt-3" block @click="$bvModal.hide('bv-modal-example')">Close Me</b-button>
                            </b-modal>
                        </div>


                    </div>


                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <p>WORK LINK</p>
                            {!!Auth::user()->website ?'<a href="'.Auth::user()->website.'""<a>Website Link</a><br/>':''!!}
                            {!!Auth::user()->facebook ?'<a href="'.Auth::user()->facebook.'""<a>Facebook Link</a><br/>':''!!}
                            {!!Auth::user()->linkedin ?'<a href="'.Auth::user()->website.'""<a>Linkedin Link</a><br/>':''!!}
                        </div>
                    </div>
                    <div class="col-md-8">
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
            </form>
        </div>
    </section>

@stop
<script src="{{ asset('js/app.js') }}"></script>





<script>
    export default {
        data() {
            return {
                form: {
                    email: '',
                    name: '',
                    food: null,
                    checked: []
                },
                foods: [{ text: 'Select One', value: null }, 'Carrots', 'Beans', 'Tomatoes', 'Corn'],
                show: true
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


