import RecruitService from './recruit.service';
import UserService from './user.service';
import axios from 'axios';

export default {
  install(Vue) {
    Vue.prototype.$recruitService = new RecruitService(axios);
    Vue.prototype.$userService = new UserService(axios);
  }
};
