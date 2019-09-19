import RecruitService from './recruit.service';
import axios from 'axios';

export default {
  install(Vue) {
    Vue.prototype.$recruitService = new RecruitService(axios);
  }
};
