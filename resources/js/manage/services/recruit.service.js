export default class RecruitService {
  constructor() {
    this.endpoint = '/manage/recrutation';
  }

  get(id){
    return axios.get(`${this.endpoint}/${id}`);
  }
  getAll(id){
    return axios.get('/manage/recrutation-all');
  }
  store(){
    return axios.post(`${this.endpoint}`);
  }
}
