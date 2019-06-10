 <div class="actions-group" style="position: relative; display: inline-block;">
<div>
            <b-button @click="$bvModal.show('modal-1')" class="btn btn-action btn-success">Edit
                <i class="fa fa-envelope-o"></i>
            </b-button>


             <b-modal id="modal-1" hide-footer>
                 <template slot="modal-title">
                     Using <code>$bvModal</code> Methods
                 </template>
                 <div class="d-block text-center">
                     <h3>Hello From This Modal!</h3>
                 </div>
                 <b-button class="mt-3" block @click="$bvModal.hide('modal-1')">Close Me</b-button>
             </b-modal>
 </div>


            <b-button  @click="$bvModal.show('modal-2')" class="btn btn-action btn-success" title="Send proposal">Show
                <i class="fa fa-envelope-o"></i>
            </b-button>
 </div>




