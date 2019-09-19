import StatusService from './status.service';

export default {
  install(Vue) {
    Vue.prototype.$statusService = new StatusService();
  }
};
